<?php

namespace backend\controllers;

use common\models\Classes;
use backend\models\Search\ClassesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Employees;
use yii\helpers\ArrayHelper;
use Yii;
use yii\web\Response;

/**
 * ClassController implements the CRUD actions for Classes model.
 */
class ClassesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Classes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ClassesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Classes model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Classes();

        $teachers = Employees::find()
            ->where(['role' => 'teacher'])
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Class created successfully!');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'teachers' => $teachers,
        ]);
    }


    /*
     * Updates an existing Classes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $teachers = Employees::find()
            ->where(['role' => 'teacher'])
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Class updated successfully!');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'teachers' => $teachers,
        ]);
    }


    /*
     * Deletes an existing Classes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Class deleted successfully!');
        return $this->redirect(['index']);
    }

    /*
     * Finds the Classes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Classes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Classes::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetTeacher($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $class = \common\models\Classes::findOne($id);
        if ($class && $class->teacher) {
            return [
                'success' => true,
                'name' => $class->teacher->name,
                'phone' => $class->teacher->mobile,
            ];
        }

        return ['success' => false];
    }
}
