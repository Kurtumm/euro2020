<?php

namespace backend\controllers;

use Yii;
use common\models\ft\UserProfile;
use common\models\ft\search\UserProfile as UserProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserProfileController implements the CRUD actions for UserProfile model.
 */
class UserProfileController extends Controller
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
     * Lists all UserProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserProfile model.
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
     * Creates a new UserProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserProfile();

        if ($model->load(Yii::$app->request->post())) {
            $flag = false;
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $userProfileIdFile = UploadFile::getInstanceByName("UserProfile['userProfileId']");
                if(isset($userProfileIdFile) && !empty($userProfileIdFile)) {
                    $folderName = 'userprofile';
                    $file = explode('.', $userProfileIdFile);
                    $folderUrl = \Yii::$app->getBasePath() . '/web/' . 'images/' . $folderName . "/";

                    if(!file_exists($folderUrl))
                        mkdir($folderUrl, 0775);

                    $fileName = \Yii::$app->security->generateRandomString(12) . '.' . end($file);
                    $fileUrl = $folderUrl.$fileName;
                    $model->userProfileId = '/images/'.$folderName.'/'.$fileName;
                }

                if($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->userProfileId]);
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
     * Updates an existing UserProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userProfileId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserProfile model.
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
     * Finds the UserProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return UserProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserProfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
