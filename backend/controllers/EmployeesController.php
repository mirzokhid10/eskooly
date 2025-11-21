<?php

namespace backend\controllers;

use common\models\Employees;
use backend\models\Search\EmployeesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;

/**
 * EmployeesController implements the CRUD actions for Employees model.
 */
class EmployeesController extends Controller
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
                    'class' => \yii\filters\VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Employees models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EmployeesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Employees();

        $employeeRole = [
           'Principal' => 'Principal',
           'Management Staff' => 'Management Staff',
           'Accountant' => 'Accountant',
            'Teacher' => 'Teacher',
            'Store Manager' => 'Store Manager',
            'Others' => 'Others',
        ];

        $genderOptions = [
            'Male' => 'Male',
            'Female' => 'Female',
        ];

        $religionOptions = [
            'Islam' => 'Islam',
            'Krist' => 'Krist',
            'Hindu' => 'Hindu',
            'Budha' => 'Budha',
        ];

        $bloodGroupOptions = [
            'A+' => 'A+',
            'A' => 'A',
            'B' => 'B',
            'B+' => 'B+',
            'O' => 'O',
            'O+' => 'O+',
        ];

        if ($model->load(Yii::$app->request->post())) {
            // Handle file upload
            $model->imageFile = UploadedFile::getInstance($model, 'photo');
            if ($model->imageFile) {
                $model->photo = 'uploads/employees/' . time() . '_' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
            }

            if ($model->validate()) {
                // Save uploaded file if exists
                if ($model->imageFile) {
                    $uploadPath = Yii::getAlias('@webroot/uploads/employees/');
                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, 0777, true);
                    }
                    $model->imageFile->saveAs(Yii::getAlias('@webroot/') . $model->photo);
                }

                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', '✅ Employee created successfully!');
                    return $this->redirect(['index']);
                }
            } else {
                $errors = [];
                foreach ($model->errors as $attribute => $messages) {
                    $errors[] = "<b>{$attribute}</b>: " . implode(', ', $messages);
                }
                Yii::$app->session->setFlash('error', "❌ Failed to save employee:<br>" . implode('<br>', $errors));
            }
        }

        return $this->render('create', [
            'model' => $model,
            'employeeRole' => $employeeRole,
            'genderOptions' => $genderOptions,
            'religionOptions' => $religionOptions,
            'bloodGroupOptions' => $bloodGroupOptions,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Dropdown lists
        $employeeRole = [
            'Principal' => 'Principal',
            'Management Staff' => 'Management Staff',
            'Accountant' => 'Accountant',
            'Teacher' => 'Teacher',
            'Store Manager' => 'Store Manager',
            'Others' => 'Others',
        ];
        $genderOptions = [
            'Male' => 'Male',
            'Female' => 'Female',
        ];
        $religionOptions = [
            'Islam' => 'Islam',
            'Krist' => 'Krist',
            'Hindu' => 'Hindu',
            'Budha' => 'Budha',
        ];
        $bloodGroupOptions = [
            'A+' => 'A+',
            'A' => 'A',
            'B' => 'B',
            'B+' => 'B+',
            'O' => 'O',
            'O+' => 'O+',
        ];

        $oldPhoto = $model->photo;

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'photo');
            if ($model->imageFile) {
                // Remove old photo if exists
                if (!empty($oldPhoto) && file_exists(Yii::getAlias('@webroot/' . $oldPhoto))) {
                    @unlink(Yii::getAlias('@webroot/' . $oldPhoto));
                }

                $model->photo = 'uploads/employees/' . time() . '_' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
            } else {
                $model->photo = $oldPhoto; // Keep old photo if not replaced
            }

            if ($model->validate()) {
                if ($model->imageFile) {
                    $uploadPath = Yii::getAlias('@webroot/uploads/employees/');
                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, 0777, true);
                    }
                    $model->imageFile->saveAs(Yii::getAlias('@webroot/') . $model->photo);
                }

                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', '✅ Employee updated successfully!');
                    return $this->redirect(['index']);
                }
            } else {
                $errors = [];
                foreach ($model->errors as $attribute => $messages) {
                    $errors[] = "<b>{$attribute}</b>: " . implode(', ', $messages);
                }
                Yii::$app->session->setFlash('error', "❌ Failed to update employee:<br>" . implode('<br>', $errors));
            }
        }

        return $this->render('update', [
            'model' => $model,
            'employeeRole' => $employeeRole,
            'genderOptions' => $genderOptions,
            'religionOptions' => $religionOptions,
            'bloodGroupOptions' => $bloodGroupOptions,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (!empty($model->photo) && file_exists(Yii::getAlias('@webroot/' . $model->photo))) {
            @unlink(Yii::getAlias('@webroot/' . $model->photo));
        }

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', '🗑️ Employee record deleted successfully!');
        } else {
            Yii::$app->session->setFlash('error', '❌ Failed to delete employee record!');
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Employees::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    
}
