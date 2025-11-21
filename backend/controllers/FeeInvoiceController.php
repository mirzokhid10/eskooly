<?php

namespace backend\controllers;

use common\models\FeeInvoices;
use backend\models\Search\FeeInvoiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * FeeInvoiceController implements the CRUD actions for FeeInvoices model.
 */
class FeeInvoiceController extends Controller
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
     * Lists all FeeInvoices models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new FeeInvoices();
        $searchModel = new FeeInvoiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->imageFile = \yii\web\UploadedFile::getInstance($model, 'imageFile');

            // handle image upload
            if ($model->imageFile) {
                $uploadedPath = $model->upload();
                if ($uploadedPath) {
                    $model->bank_logo = $uploadedPath; // store path to DB
                }
            }

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', 'Bank added successfully.');
                return $this->refresh();
            }
        }

        $banks = FeeInvoices::find()->all();

        return $this->render('index', [
            'model' => $model,
            'banks' => $banks,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $searchModel = new FeeInvoiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Bank Updated Successfully.');
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Fee Invoice Deleted Successfully.');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = FeeInvoices::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
