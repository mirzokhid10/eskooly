<?php

namespace backend\controllers;

use app\models\TransactionsSearch;
use backend\models\Search\StudentsClass;
use common\models\Classes;
use common\models\FeeParticulars;
use common\models\StudentPayments;
use backend\models\StudentPaymentsSearch;
use common\models\Students;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use Yii;

/**
 * StudentPaymentsController implements the CRUD actions for StudentPayments model.
 */
class StudentPaymentsController extends Controller
{
    // Renders the index page with the search bar
    public function actionIndex()
    {
        $searchModel = new StudentsClass(); // <-- use STUDENTS search
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Preload class + latest payment (optional, for performance)
        $dataProvider->query
            ->with([
                'class',
                'studentPayments' => function ($q) {
                    $q->orderBy(['fee_date' => SORT_DESC]);
                }
            ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBasicList() {
        $classId = Yii::$app->request->get('class_id');
        $query = Students::find();

        if (!empty($classId)) {
            // filter by class_id using the pivot table (student_classes)
            $query->joinWith('studentClasses')->where(['student_classes.class_id' => $classId]);
        }

        $students = $query->all();
        $classes = Classes::find()->select(['name', 'id'])->asArray()->all();

        return $this->render('index', [
            'students' => $students,
            'classes' => $classes,
            'selectedClass' => $classId,
        ]);


    }

    public function actionCreate($id) {
        $student = Students::findOne($id);
        print_r($student->name);

        return $this->render('create', [
            'student' => $student,
        ]);
    }
    public function actionPaymentDetail($id)
    {
        $student = Students::findOne($id);
        if (!$student) {
            throw new NotFoundHttpException('Student not found.');
        }

        $feeParticulars = FeeParticulars::find()->orderBy(['sort_order' => SORT_ASC])->all();

        return $this->render('payment-detail', [
            'student' => $student,
            'feeParticulars' => $feeParticulars,
        ]);
    }


}
