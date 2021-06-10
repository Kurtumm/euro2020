<?php

namespace backend\controllers;

use Yii;
use common\models\ft\UserTournamentPoint;
use common\models\ft\search\UserTournamentPoint as UserTournamentPointSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserTournamentPointController implements the CRUD actions for UserTournamentPoint model.
 */
class UserTournamentPointController extends Controller
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
     * Lists all UserTournamentPoint models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserTournamentPointSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserTournamentPoint model.
     * @param integer $userId
     * @param string $tournamentId
     * @return mixed
     */
    public function actionView($userId, $tournamentId)
    {
        return $this->render('view', [
            'model' => $this->findModel($userId, $tournamentId),
        ]);
    }

    /**
     * Creates a new UserTournamentPoint model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserTournamentPoint();

        if ($model->load(Yii::$app->request->post())) {
            $flag = false;
            $transaction = Yii::$app->db->beginTransaction();
            try {

                if($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'userId' => $model->userId, 'tournamentId' => $model->tournamentId]);
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
     * Updates an existing UserTournamentPoint model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $userId
     * @param string $tournamentId
     * @return mixed
     */
    public function actionUpdate($userId, $tournamentId)
    {
        $model = $this->findModel($userId, $tournamentId);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'userId' => $model->userId, 'tournamentId' => $model->tournamentId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserTournamentPoint model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $userId
     * @param string $tournamentId
     * @return mixed
     */
    public function actionDelete($userId, $tournamentId)
    {
        $this->findModel($userId, $tournamentId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserTournamentPoint model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $userId
     * @param string $tournamentId
     * @return UserTournamentPoint the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($userId, $tournamentId)
    {
        if (($model = UserTournamentPoint::findOne(['userId' => $userId, 'tournamentId' => $tournamentId])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
