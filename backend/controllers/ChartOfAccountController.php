<?php

namespace backend\controllers;

use common\models\ChartOfAccount;
use app\models\ChartOfAccountSearch;
use common\models\Employees;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ChartOfAccountController implements the CRUD actions for ChartOfAccount model.
 */
class ChartOfAccountController extends Controller
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

    public function actionIndex()
    {
        $model = new ChartOfAccount();
        $searchModel = new ChartOfAccountSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $headTypes = [
            'income' => 'Income',
            'expense' => 'Expense',
        ];

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Account created successfully.');
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
            'headTypes' => $headTypes,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new ChartOfAccount();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model) {
            try {
                $model->delete();
                Yii::$app->session->setFlash('success', 'Account deleted successfully.');
            } catch (\Throwable $e) {
                Yii::$app->session->setFlash('error', 'Unable to delete this account. It may be linked to other records.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'The requested account was not found.');
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = ChartOfAccount::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
