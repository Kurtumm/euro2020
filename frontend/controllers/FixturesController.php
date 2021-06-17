<?php

namespace frontend\controllers;

use frontend\models\ft\TournamentGroupTable;
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
use function foo\func;

/**
 * Site controller
 */
class FixturesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'guess', 'user-guess', 'update-result'],
                'rules' => [
                    [
                        'actions' => ['index', 'guess', 'user-guess', 'update-result'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
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
        $fixtures = TournamentMatch::find()
            ->joinWith([
                'homeCountry',
                'awayCountry',
                'userTournamentMatch A' => function ($q) {
                    $q->onCondition(['A.userId' => Yii::$app->user->id]);
                }
            ])
            ->orderBy([
                'tournament_match.matchDateTime' => SORT_ASC,
            ])
            ->all();

        $userTournamentGuessChamp = UserTournamentGuessChamp::find()
            ->joinWith([
                'country A'
            ])
            ->where([
                'userId' => Yii::$app->user->id,
                'tournamentId' => 1,
            ])
            ->one();

        return $this->render('index', compact('fixtures', 'userTournamentGuessChamp'));
    }

    public function actionGuess($id)
    {
        $tournamentMatch = TournamentMatch::find()
            ->joinWith([

            ])
            ->where(['tournament_match.tournamentMatchId' => $id])
            ->one();

        $userTournamentMatch = UserTournamentMatch::find()
            ->where([
                'userId' => Yii::$app->user->id,
                'tournamentMatchId' => $id,
            ])
            ->one();

        if (!isset($userTournamentMatch)) {
            $userTournamentMatch = new UserTournamentMatch();
        }

        if ($userTournamentMatch->load(Yii::$app->request->post())) {
            $userTournamentMatch->tournamentMatchId = $tournamentMatch->tournamentMatchId;
            $userTournamentMatch->userId = Yii::$app->user->id;
            $userTournamentMatch->totalPoint = 0;

            if ($userTournamentMatch->isNewRecord) {
                $userTournamentMatch->createDateTime = new Expression('NOW()');
            }

            $userTournamentMatch->updateDateTime = new Expression('NOW()');

            if ($userTournamentMatch->save()) {
                return $this->redirect('/fixtures');
            } else {
                print_r($userTournamentMatch->errors);
            }
        }

        return $this->render('guess', compact('tournamentMatch', 'userTournamentMatch'));
    }

    public function actionUserGuess($id)
    {
        $tournamentMatch = TournamentMatch::find()
            ->joinWith([
                'userTournamentMatches' => function ($q) {
                    $q->joinWith([
                        'user'
                    ]);
                },
            ])
            ->where(['tournament_match.tournamentMatchId' => $id])
            ->one();

        return $this->render('user-guess', compact('tournamentMatch'));
    }

    public function actionUpdateResult($id)
    {
        if (Yii::$app->user->id != 1) {
            return $this->redirect('/fixtures');
        }
        $tournamentMatch = TournamentMatch::find()
            ->joinWith([
                'userTournamentMatches' => function ($q) {
                    $q->joinWith([
                        'user'
                    ]);
                },
            ])
            ->where(['tournament_match.tournamentMatchId' => $id])
            ->one();

        if ($tournamentMatch->load(Yii::$app->request->post())) {
            if ($tournamentMatch->save()) {

                $this->calculateUserTournamentMatchPoint($tournamentMatch);

                $this->actionCalculateTournamentGroupTable();

//                return $this->redirect('/fixtures');
            } else {
                print_r($tournamentMatch->errors);
            }
        }

        return $this->render('update-result', compact('tournamentMatch'));
    }

    public function calculateUserTournamentMatchPoint($tournamentMatch)
    {
        //update user_tournament_match matchResult
        $a = UserTournamentMatch::updateAll(['point' => 2], [
            'tournamentMatchId' => intval($tournamentMatch->tournamentMatchId),
            'matchResult' => intval($tournamentMatch->matchResult)
        ]);

        //update user_tournament_match correct score one side (homeScore or awayScore)
        $b = UserTournamentMatch::updateAll(['scorePoint' => 1], [
            'AND',
            ['tournamentMatchId' => $tournamentMatch->tournamentMatchId],
            [
                'OR',
                ['homeScore' => $tournamentMatch->homeScore],
                ['awayScore' => $tournamentMatch->awayScore]
            ]
        ]);

        //update user_tournament_match correct score both side
        $c = UserTournamentMatch::updateAll(['scorePoint' => 3], [
            'homeScore' => $tournamentMatch->homeScore,
            'awayScore' => $tournamentMatch->awayScore,
            'tournamentMatchId' => $tournamentMatch->tournamentMatchId,
        ]);

        $d = UserTournamentMatch::updateAll([
            'totalPoint' => new Expression('(point+scorePoint)*multiplePoint')
        ]);

        return;
    }

    public function actionGuessChamp()
    {
        if (date('Y-m-d H:i:s') > '2021-06-16 04:00:00') {
            return $this->goBack();
        }

        $tournamentGroupTables = TournamentGroupTable::find()
            ->joinWith([
                'country A'
            ])
            ->where([
                'tournamentId' => 1,
            ])
            ->orderBy(['A.name' => SORT_ASC])
            ->all();
        $userTournamentGuessChamp = UserTournamentGuessChamp::find()
            ->where([
                'tournamentId' => 1,
                'userId' => Yii::$app->user->id,
            ])
            ->one();

        if (!isset($userTournamentGuessChamp)) {
            $userTournamentGuessChamp = new UserTournamentGuessChamp();
        }

        if ($userTournamentGuessChamp->load(Yii::$app->request->post())) {
            $userTournamentGuessChamp->userId = Yii::$app->user->id;
            $userTournamentGuessChamp->tournamentId = 1;

            if ($userTournamentGuessChamp->save()) {
                return $this->redirect('/fixtures');
            } else {
                print_r($userTournamentGuessChamp->errors);
            }
        }

        return $this->render('guess-champ', compact('tournamentGroupTables', 'userTournamentGuessChamp'));
    }

    public function actionCalculateTournamentGroupTable()
    {
        $data = TournamentMatch::calculateTable();

        foreach ($data as $k => $v) {
            TournamentGroupTable::updateAll([
                'won' => $v['won'],
                'draw' => $v['draw'],
                'lost' => $v['lost'],
                'ga' => $v['ga'],
                'gf' => $v['gf'],
                'gd' => $v['gd'],
                'point' => $v['point'],
            ], [
                'countryId' => $k,
            ]);
        }

        var_dump($data);
    }

    public function actionReCalculate()
    {
//        $this->calculateUserTournamentMatchPoint();
        $this->actionCalculateTournamentGroupTable();
    }
}
