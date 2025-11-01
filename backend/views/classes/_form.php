<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Classes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="classes-form row mt-4">
    <div class="col-md-12 col-lg-3"></div>
    <div class="col-md-12 col-lg-6 rounded-4 bg-white p-4">

        <?php $form = ActiveForm::begin(); ?>
        <h1 class="text-center mt-2 fw-bold">
            <?= Html::encode($this->title) ?>
            <br>
            <div style="width:20px;height:7px;border-radius:10px;display:inline-block; background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;"></div>
            <span style="display:inline-block;font-weight:100; color:#4d4cac;">Required*</span>
            <div style="width:20px;height:7px;border-radius:10px;display:inline-block; background: linear-gradient(87deg, #8898aa 0, #888aaa 100%) !important;"></div>
            <span style="display:inline-block;font-weight:100; color:#4d4cac;">Optional</span>
        </h1>
        <div class="m-div">
            <label class="m-label bg-gradient-blue text-white position-absolute">Class Name*</label>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0'])->label(false) ?>
        </div>
        <div class="m-div">
            <label class="m-label bg-gradient-blue text-white position-absolute">Monthly Tuition Fees*</label>
        <?= $form->field($model, 'monthly_fee')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0'])->label(false) ?>
        </div>
        <div class="m-div">
            <label class="m-label bg-gradient-blue text-white position-absolute">Select Class Teacher*</label>
            <?= $form->field($model, 'teacher_id')->dropDownList(
                $teachers,
                ['prompt' => 'Select Teacher', 'class' => 'form-control rounded-4 border-0']
            )->label(false) ?>
        </div>

        <div class="form-group my-5 d-flex justify-content-center">
            <?= Html::submitButton(
                $model->isNewRecord ? '+ Create' : '✎ Update',
                ['class' => 'btn submit btn-warning rounded-4']
            ) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-12 col-lg-3"></div>
</div>
