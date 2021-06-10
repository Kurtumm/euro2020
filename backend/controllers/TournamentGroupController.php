<?php

namespace backend\controllers;

use Yii;
use common\models\ft\TournamentGroup;
use common\models\ft\search\TournamentGroup as TournamentGroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TournamentGroupController implements the CRUD actions for TournamentGroup model.
 */
class TournamentGroupController extends Controller
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
     * Lists all TournamentGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TournamentGroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TournamentGroup model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TournamentGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TournamentGroup();

        if ($model->load(Yii::$app->request->post())) {
            $flag = false;
            $transaction = Yii::$app->db->beginTransaction();
            try {

                if($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->tournamentGroupId]);
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
     * Updates an existing TournamentGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tournamentGroupId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TournamentGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TournamentGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TournamentGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TournamentGroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
