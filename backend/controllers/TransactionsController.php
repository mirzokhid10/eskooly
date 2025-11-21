<?php

namespace backend\controllers;

use common\models\ChartOfAccount;
use common\models\Transactions;
use app\models\TransactionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * TransactionsController implements the CRUD actions for Transactions model.
 */
class TransactionsController extends Controller
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
        $searchModel = new TransactionsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddIncome()
    {
        $model = new Transactions();
        $model->type = 'income';
        $model->date = date('Y-m-d'); // Default to today's date

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Income has been added successfully.');
            return $this->redirect(['add-income']);
        }

        // Get only income accounts from Chart of Accounts
        $incomeAccounts = ChartOfAccount::find()
            ->where(['type' => 'income'])
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column();



        return $this->render('add-income', [
            'model' => $model,
            'incomeAccounts' => $incomeAccounts,
        ]);
    }

    public function actionAddExpense()
    {
        $model = new Transactions();
        $model->type = 'expense';
        $model->date = date('Y-m-d'); // Default to today's date

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Expense has been added successfully.');
            return $this->redirect(['add-expense']);
        }

        // Get only income accounts from Chart of Accounts
        $expenseAccounts = ChartOfAccount::find()
            ->where(['type' => 'expense'])
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column();



        return $this->render('add-expense', [
            'model' => $model,
            'expenseAccounts' => $expenseAccounts,
        ]);
    }

    public function actionCreate()
    {
        $model = new Transactions();

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

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Transactions::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
