<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\FeeInvoices $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="fee-invoices-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="m-div">
        <label class="m-label bg-gradient-blue text-white position-absolute">Institute Logo*</label>
        <div class="d-flex align-items-center justify-content-start">
            <?= Html::img(
                $model->bank_logo ? Yii::getAlias('@web/' . $model->bank_logo) : '@web/assets/icons/no-logo.jpg',
                ['alt' => 'Institute Logo', 'class' => 'rounded-circle m-2', 'style' => 'width:120px; height:120px;']
            ) ?>
            <label class="inline-block cursor-pointer btn btn-sm bg-gradient-blue text-white px-4 py-2 rounded-pill">
                <i class="fa-regular fa-image"></i> Change Logo
                <?= $form->field($model, 'imageFile')->fileInput([
                    'class'=>'form-control rounded-4 border-0 hidden',
                    'placeholder' => 'Upload student photo'
                ])->label(false) ?>
            </label>
        </div>
    </div>

    <div class="m-div">
        <label class="m-label bg-gradient-blue text-white position-absolute">Bank Name*</label>
        <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0', 'placeholder'=>'Your Bank Name'])->label(false) ?>
    </div>
    <div class="m-div">
        <label class="m-label bg-gradient-blue text-white position-absolute">Bank/Branch Address*</label>
        <?= $form->field($model, 'bank_address')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0', 'placeholder'=>'Bank Address'])->label(false) ?>
    </div>
    <div class="m-div">
        <label class="m-label bg-gradient-blue text-white position-absolute">Account Number*</label>
        <?= $form->field($model, 'bank_account')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0', 'placeholder'=>'Bank Account No'])->label(false) ?>
    </div>
    <div class="m-div">
        <label class="m-label bg-gradient-blue text-white position-absolute">Instructions</label>
        <?= $form->field($model, 'instruction')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0', 'placeholder'=>'Write Instructions'])->label(false) ?>
    </div>

<!--    <div class="form-group">-->
<!--        --><?php //= Html::submitButton('+ Add Bank', ['class' => 'btn bg-c-yellow mt-4 rounded-4 px-3 py-2 mx-auto d-block']) ?>
<!--    </div>-->
    <div class="form-group ">
        <?= Html::submitButton(
            $model->isNewRecord ? '✓ Submit' : '✎ Update',
            ['class'=>'btn bg-c-yellow mt-4 rounded-4 px-3 py-2 mx-auto d-block']
        ) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
