<?php
namespace frontend\controllers;

use frontend\models\ft\Tournament;
use frontend\models\ft\TournamentMatch;
use frontend\models\ft\UserTournamentGuessChamp;
use frontend\models\ft\UserTournamentMatch;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\db\Expression;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'index'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        ini_set('memory_limit', '-1');
        $tournament = Tournament::find()
            ->joinWith([
                'tournamentGroups A' => function($q) {
                    $q->joinWith([
                        'tournamentGroupTables' => function($q) {
                            $q->joinWith([
                                'country'
                            ]);
                            $q->orderBy([
                                'point' => SORT_DESC,
                                'gd' => SORT_DESC,
                                'gf' => SORT_DESC,
                            ]);
                        }
                    ]);
                    $q->orderBy([
                        'A.tournamentGroupId' => SORT_ASC,
                    ]);
                }
            ])
            ->where([
                'tournament.tournamentId' => 1
            ])
            ->one();


        $countWrongMatchResult = UserTournamentMatch::find()
            ->select([
                'userId',
                'countWrongMatchResult' => new Expression('count(*)')
            ])
            ->where([
                'point'=>0
            ])
            ->groupBy('userId');

        $countCorrectMatchResult = UserTournamentMatch::find()
            ->select([
                'userId',
                'countCorrectMatchResult' => new Expression('count(*)')
            ])
            ->where([
                'point'=>2
            ])
            ->groupBy('userId');

        $oneSideScore = UserTournamentMatch::find()
            ->select([
                'userId',
                'oneSideScore' => new Expression('count(*)')
            ])
            ->where([
                'scorePoint'=>1
            ])
            ->groupBy('userId');

        $twoSideScore = UserTournamentMatch::find()
            ->select([
                'userId',
                'twoSideScore' => new Expression('count(*)')
            ])
            ->where([
                'scorePoint'=>3
            ])
            ->groupBy('userId');

        $sql = "SELECT
	A.id,
	A.username,
	D.countCorrectMatchResult,
	C.countWrongMatchResult,
	E.oneSideScore,
	F.twoSideScore,
       G.wrongScore,
	SUM(B.point) AS sumPoint,
	SUM(B.scorePoint) AS sumScorePoint,
	SUM(B.totalPoint) AS sumTotalPoint
FROM
	`user` A
	INNER JOIN user_tournament_match B ON A.id = B.userId
	LEFT JOIN (
		SELECT
			A.userId,
				count(*) AS countWrongMatchResult
		FROM
			user_tournament_match A
        INNER JOIN tournament_match B on A.tournamentMatchId=B.tournamentMatchId
        WHERE A.`point` = 0 and B.matchResult is not null
		GROUP BY
			userId) C ON A.id = C.userId
	LEFT JOIN (
		SELECT
			A.userId,
			count(*) AS countCorrectMatchResult
		FROM
			user_tournament_match A
        INNER JOIN tournament_match B on A.tournamentMatchId=B.tournamentMatchId
        WHERE A.`point` = 2 and B.matchResult is not null
		GROUP BY
			userId) D ON A.id = D.userId
	LEFT JOIN (
		SELECT
			A.userId,
			count(*) AS oneSideScore
		FROM
			user_tournament_match A
        INNER JOIN tournament_match B on A.tournamentMatchId=B.tournamentMatchId
        WHERE A.`scorePoint` = 1 and B.matchResult is not null
		GROUP BY
			userId) E ON A.id = E.userId
	LEFT JOIN (
		SELECT
			A.userId,
			count(*) AS twoSideScore
		FROM
			user_tournament_match A
        INNER JOIN tournament_match B on A.tournamentMatchId=B.tournamentMatchId
        WHERE A.`scorePoint` = 3 and B.matchResult is not null
		GROUP BY
			userId) F ON A.id = F.userId

	LEFT JOIN (
		SELECT
			A.userId,
			count(*) AS wrongScore
		FROM
			user_tournament_match A
        INNER JOIN tournament_match B on A.tournamentMatchId=B.tournamentMatchId
        WHERE A.`scorePoint` = 0 and B.matchResult is not null
		GROUP BY
			userId) G ON A.id = G.userId
GROUP BY
	A.id
	
	ORDER BY sumTotalPoint DESC,D.countCorrectMatchResult DESC, F.twoSideScore DESC, E.oneSideScore DESC";

        $userTable = Yii::$app->db->createCommand($sql)->queryAll();

        $fixtures = TournamentMatch::find()
            ->joinWith([
                'homeCountry',
                'awayCountry',
                'userTournamentMatch A' => function ($q) {
                    $q->onCondition(['A.userId' => Yii::$app->user->id]);
                }
            ])
            ->where(['DATE(matchDateTime)' => date('Y-m-d')])
            ->orderBy([
                'tournament_match.matchDateTime' => SORT_ASC,
            ])
            ->all();

        $guessChamps = UserTournamentGuessChamp::find()->joinWith(['user', 'country'])->all();

        return $this->render('index', compact('tournament', 'userTable', 'fixtures', 'guessChamps'));
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'signin';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
