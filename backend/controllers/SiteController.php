<?php

namespace backend\controllers;

use common\models\Classes;
use common\models\Employees;
use common\models\LoginForm;
use common\models\Students;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\db\Query;

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
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $totalStudents = Students::find()->count();
        // You can also calculate "this month's new students"
        $monthStart = strtotime(date('Y-m-01 00:00:00'));
        $monthEnd = strtotime(date('Y-m-t 23:59:59'));
        $studentsThisMonth = Students::find()
            ->where(['between', 'created_at', $monthStart, $monthEnd])
            ->count();

        $totalEmployees = Employees::find()->count();
        // You can also calculate "this month's new students"
        $employeesThisMonth = Employees::find()
            ->where(['between', 'created_at', $monthStart, $monthEnd])
            ->count();

        // Statistics Based On Expenses & Incomes

        $months = ['Jun 2025', 'Jul 2025', 'Aug 2025', 'Sep 2025', 'Oct 2025', 'Nov 2025'];
        $income = [0, 0, 1000000, 3000000, 0, 0];
        $expenses = [0, 0, 200000, 14000000, 0, 0];

        // Class-wise student statistics
        $db = \Yii::$app->db;
        $classRows = (new Query())
            ->select(['s.class_id', 'c.name AS class_name', 'COUNT(*) AS students'])
            ->from(['s' => Students::tableName()])
            ->leftJoin(['c' => Classes::tableName()], 'c.id = s.class_id')
            ->groupBy('s.class_id')
            ->orderBy('students DESC')
            ->all($db);

        $classStats = [];
        foreach ($classRows as $r) {
            $className = $r['class_name'] !== null ? $r['class_name'] : 'Unassigned';
            $classStats[] = [
                'name' => $className,
                'students' => (int)$r['students'],
            ];
        }

        return $this->render('dashboard', [
            'totalStudents' => $totalStudents,
            'studentsThisMonth' => $studentsThisMonth,
            'totalEmployees' => $totalEmployees,
            'employeesThisMonth' => $employeesThisMonth,

            // Statistics Based On Expenses & Incomes Linkers
            'months' => $months,
            'income' => $income,
            'expenses' => $expenses,

            'classStats' => $classStats,
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
