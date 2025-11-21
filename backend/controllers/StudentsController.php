<?php

namespace backend\controllers;

use common\models\Classes;
use common\models\StudentClasses;
use common\models\Students;
use backend\models\Search\StudentsClass;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use Yii;

/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new StudentsClass();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = Students::findOne($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Students();
        $classes = Classes::find()->select(['name', 'id'])->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post())) {
            // Get uploaded file
            $model->imageFile = UploadedFile::getInstance($model, 'photo');
            if ($model->imageFile) {
                $model->upload();
            }

            $selectedClasses = Yii::$app->request->post('Students')['class_id'] ?? [];
            if (!is_array($selectedClasses)) {
                $selectedClasses = [$selectedClasses];
            }

            if ($model->validate()) {
                // Upload image if provided
                if ($model->imageFile) {
                    $model->upload();
                }

                if ($model->save(false)) {
                    foreach ($selectedClasses as $classId) {
                        $sc = new StudentClasses();
                        $sc->student_id = $model->id;
                        $sc->class_id = $classId;
                        $sc->save(false);
                    }

                    Yii::$app->session->setFlash('success', '✅ Student created successfully!');
                    return $this->redirect(['index']);
                }
            } else {
                $errors = [];
                foreach ($model->errors as $attribute => $messages) {
                    $errors[] = "<b>{$attribute}</b>: " . implode(', ', $messages);
                }
                Yii::$app->session->setFlash('error', "❌ Failed to save student:<br>" . implode('<br>', $errors));
            }
        }

        return $this->render('create', [
            'model' => $model,
            'classes' => $classes,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $classes = Classes::find()->select(['name', 'id'])->indexBy('id')->column();

        // Get current class IDs (if using pivot table)
        $model->class_ids = $model->getClasses()->select('id')->column();

        if ($model->load(Yii::$app->request->post())) {
            // ✅ Handle uploaded file
            $model->imageFile = UploadedFile::getInstance($model, 'photo');
            if ($model->imageFile) {
                // Remove old photo if exists
                if (!empty($model->photo) && file_exists(Yii::getAlias('@webroot/' . $model->photo))) {
                    @unlink(Yii::getAlias('@webroot/' . $model->photo));
                }

                // Upload new photo
                $model->upload();
            }

            $selectedClasses = Yii::$app->request->post('Students')['class_id'] ?? [];
            if (!is_array($selectedClasses)) {
                $selectedClasses = [$selectedClasses];
            }

            if ($model->validate()) {
                if ($model->save(false)) {

                    // ✅ Update student_classes junction table
                    Yii::$app->db->createCommand()
                        ->delete('{{%student_classes}}', ['student_id' => $model->id])
                        ->execute();

                    foreach ($selectedClasses as $classId) {
                        $sc = new StudentClasses();
                        $sc->student_id = $model->id;
                        $sc->class_id = $classId;
                        $sc->save(false);
                    }

                    Yii::$app->session->setFlash('success', '✅ Student updated successfully!');
                    return $this->redirect(['index']);
                }
            } else {
                $errors = [];
                foreach ($model->errors as $attribute => $messages) {
                    $errors[] = "<b>{$attribute}</b>: " . implode(', ', $messages);
                }
                Yii::$app->session->setFlash('error', "❌ Failed to update student:<br>" . implode('<br>', $errors));
            }
        }

        return $this->render('update', [
            'model' => $model,
            'classes' => $classes,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        Yii::$app->db->createCommand()->delete('{{%student_classes}}', ['student_id' => $model->id])->execute();

        $model->delete();

        Yii::$app->session->setFlash('success', 'Student deleted successfully!');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested student does not exist.');
    }

    public function actionGetTeacher($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $class = Classes::findOne($id);

        if ($class && $class->teacher) {
            return [
                'success' => true,
                'name' => $class->teacher->name ?? '',
                'phone' => $class->teacher->phone ?? '',
            ];
        }

        return ['success' => false, 'name' => '', 'phone' => ''];
    }

    public function actionSearch($term = '')
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $results = [];

        if (!empty($term)) {
            $students = Students::find()
                ->where(['like', 'full_name', $term])
                ->limit(10)
                ->all();

            foreach ($students as $student) {
                $results[] = [
                    'id' => $student->id,
                    'text' => $student->full_name,
                ];
            }
        }

        return ['results' => $results];
    }

    public function actionAdmissionLetter($id)
    {
        $student = Students::findOne($id);
        if (!$student) {
            throw new \yii\web\NotFoundHttpException('Student not found.');
        }

        return $this->render('admission-letter', [
            'student' => $student,
        ]);
    }

    public function actionBasicList()
    {
        $classId = Yii::$app->request->get('class_id'); // get selected class id
        $query = Students::find();

        if (!empty($classId)) {
            // filter by class_id using the pivot table (student_classes)
            $query->joinWith('studentClasses')->where(['student_classes.class_id' => $classId]);
        }

        $students = $query->all();
        $classes = Classes::find()->select(['name', 'id'])->asArray()->all();

        return $this->render('basic-list', [
            'students' => $students,
            'classes' => $classes,
            'selectedClass' => $classId,
        ]);

    }


}
