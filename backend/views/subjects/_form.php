<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/** @var yii\web\View $this */
/** @var common\models\Subjects $model */
/** @var yii\widgets\ActiveForm $form */
/** @var common\models\Classes $classes*/
/** @var common\models\Subjects $modelSubject */
/** @var common\models\Subjects[] $modelsSubjects */

?>
<div class="subjects-form row mt-4">
    <div class="col-md-12 col-lg-3"></div>
    <div class="col-md-12 col-lg-6 rounded-4 bg-white p-4">
        <?php $form = ActiveForm::begin(); ?>
        <h1 class="text-center mt-2 fs-20 fw-bold">
            <?= Html::encode($this->title) ?>
            <br>
            <div style="width:20px;height:7px;border-radius:10px;display:inline-block; background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;"></div>
            <span class="fs-12" style="display:inline-block;font-weight:100; color:#4d4cac;">Required*</span>
            <div style="width:20px;height:7px;border-radius:10px;display:inline-block; background: linear-gradient(87deg, #8898aa 0, #888aaa 100%) !important;"></div>
            <span class="fs-12" style="display:inline-block;font-weight:100; color:#4d4cac;">Optional</span>
        </h1>
        <div class="m-div">
            <label class="m-label bg-gradient-blue text-white position-absolute">Select Class*</label>
            <?= $form->field($model, 'class_id')->dropDownList(
                $classes,
                ['prompt' => 'Select Class', 'class' => 'form-control rounded-4 border-0']
            )->label(false) ?>
        </div>
        <div class="row m-0 d-flex align-items-center justify-content-between">
            <div class="m-div col-md-6 col-sm-12 px-2">
                <label class="m-label bg-gradient-blue text-white position-absolute">Subject Name*</label>
                <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0', 'placeholder'=>'Name Of Subject'])->label(false) ?>
            </div>
            <div class="m-div col-md-5 col-sm-12 px-2">
                <label class="m-label bg-gradient-blue text-white position-absolute">Marks*</label>
                <?= $form->field($model, 'total_marks')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0', 'placeholder'=>'Name Of Subject'])->label(false) ?>
            </div>
        </div>
        <div class="form-group my-5 d-flex justify-content-center">
            <?= Html::submitButton(
                $model->isNewRecord ? '+ Assign Subjects' : '✎ Update Subjects',
                ['class' => 'btn submit btn-warning rounded-4']
            ) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-12 col-lg-3"></div>
</div>