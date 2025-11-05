<?php

namespace backend\controllers;

use common\models\FeeParticulars;
use backend\models\Search\FeeParticularsClass;
use common\models\FreeForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * FeeParticularsController implements the CRUD actions for FeeParticulars model.
 */
class FeeParticularsController extends Controller
{

    public function actionUpdate()
    {
        $feeParticularsList = FeeParticulars::find()
            ->indexBy('id')
            ->orderBy('sort_order')
            ->all();

        if (empty($feeParticularsList)) {
            throw new NotFoundHttpException('No Fee particulars found.');
        }

        $formModel = new FreeForm();

        if ($formModel->load(Yii::$app->request->post())) {
            if ($formModel->save()) {
                Yii::$app->session->setFlash('success', '✅ Fee particulars updated successfully!');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', '❌ There was an error updating the particulars.');
            }
        }

        return $this->render('update', [
            'formModel' => $formModel, // used for the target_type DropDownList
            'feeParticulars' => $feeParticularsList // used for the table loop
        ]);
    }

}
