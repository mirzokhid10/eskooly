<?php

namespace backend\controllers;

use common\models\InstituteProfile;
use backend\models\Search\InstitureProfileClass;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * InstituteProfileController implements the CRUD actions for InstituteProfile model.
 */
class InstituteProfileController extends Controller
{

    public function actionUpdate()
    {
        $model = InstituteProfile::find()->one();

        if (!$model) {
            throw new NotFoundHttpException('Institute profile not found.');
        }

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->imageFile) {
                $newPath = $model->upload();
                if ($newPath) {
                    // Delete old logo
                    if (!empty($model->institute_logo) && file_exists(Yii::getAlias('@webroot/' . $model->institute_logo))) {
                        @unlink(Yii::getAlias('@webroot/' . $model->institute_logo));
                    }
                    $model->institute_logo = $newPath;
                }
            }

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', '✅ Institute profile updated successfully!');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', '❌ Failed to update profile.');
            }
        }

        return $this->render('update', ['model' => $model]);
    }
}
