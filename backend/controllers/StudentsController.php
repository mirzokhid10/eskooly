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
    /**
     * @inheritDoc
     */
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

    /**
     * Lists all Students models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StudentsClass();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Students::findOne($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
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


    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->class_ids = $model->getClasses()->select('id')->column();

        $classes = Classes::find()->select(['name', 'id'])->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->save(false)) {
                    Yii::$app->db->createCommand()->delete('{{%student_classes}}', ['student_id' => $model->id])->execute();

                    if (!empty($model->class_ids)) {
                        foreach ($model->class_ids as $classId) {
                            Yii::$app->db->createCommand()->insert('{{%student_classes}}', [
                                'student_id' => $model->id,
                                'class_id' => $classId,
                            ])->execute();
                        }
                    }

                    Yii::$app->session->setFlash('success', '✅ Student updated successfully!');
                    return $this->redirect(['index']);
                }
            } else {
                $errors = [];
                foreach ($model->errors as $attribute => $messages) {
                    $errors[] = "<b>{$attribute}</b>: " . implode(', ', $messages);
                }
                Yii::$app->session->setFlash('error', "❌ Update failed:<br>" . implode('<br>', $errors));
            }
        }

        return $this->render('update', [
            'model' => $model,
            'classes' => $classes,
        ]);
    }


    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        Yii::$app->db->createCommand()->delete('{{%student_classes}}', ['student_id' => $model->id])->execute();

        $model->delete();

        Yii::$app->session->setFlash('success', 'Student deleted successfully!');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
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
}
