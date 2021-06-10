<?php

namespace backend\controllers;

use Yii;
use common\models\ft\UserHasTournamentMatch;
use common\models\ft\search\UserHasTournamentMatch as UserHasTournamentMatchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserHasTournamentMatchController implements the CRUD actions for UserHasTournamentMatch model.
 */
class UserHasTournamentMatchController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserHasTournamentMatch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserHasTournamentMatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserHasTournamentMatch model.
     * @param integer $userId
     * @param string $tournamentMatchId
     * @return mixed
     */
    public function actionView($userId, $tournamentMatchId)
    {
        return $this->render('view', [
            'model' => $this->findModel($userId, $tournamentMatchId),
        ]);
    }

    /**
     * Creates a new UserHasTournamentMatch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserHasTournamentMatch();

        if ($model->load(Yii::$app->request->post())) {
            $flag = false;
            $transaction = Yii::$app->db->beginTransaction();
            try {

                if($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'userId' => $model->userId, 'tournamentMatchId' => $model->tournamentMatchId]);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserHasTournamentMatch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $userId
     * @param string $tournamentMatchId
     * @return mixed
     */
    public function actionUpdate($userId, $tournamentMatchId)
    {
        $model = $this->findModel($userId, $tournamentMatchId);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'userId' => $model->userId, 'tournamentMatchId' => $model->tournamentMatchId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserHasTournamentMatch model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $userId
     * @param string $tournamentMatchId
     * @return mixed
     */
    public function actionDelete($userId, $tournamentMatchId)
    {
        $this->findModel($userId, $tournamentMatchId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserHasTournamentMatch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $userId
     * @param string $tournamentMatchId
     * @return UserHasTournamentMatch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($userId, $tournamentMatchId)
    {
        if (($model = UserHasTournamentMatch::findOne(['userId' => $userId, 'tournamentMatchId' => $tournamentMatchId])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
