<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Employees $model */
/** @var common\models\Employees $employeeRole */
/** @var common\models\Employees $genderOptions */
/** @var common\models\Employees $religionOptions */
/** @var common\models\Employees $bloodGroupOptions */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="employees-form">

    <?php $form = ActiveForm::begin(); ?>
    <h1 class="text-center mt-2 fw-bold">
        <?= Html::encode($this->title) ?>
        <br>
        <div style="width:20px;height:7px;border-radius:10px;display:inline-block; background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;"></div>
        <span style="display:inline-block;font-weight:100; color:#4d4cac;">Required*</span>
        <div style="width:20px;height:7px;border-radius:10px;display:inline-block; background: linear-gradient(87deg, #8898aa 0, #888aaa 100%) !important;"></div>
        <span style="display:inline-block;font-weight:100; color:#4d4cac;">Optional</span>
    </h1>
    <div class="row" style="border:0px solid #9698d6;padding:5px 5px 5px 15px;">
        <h6 class="w-100 py-2" style="border-bottom:1px solid #999;">
            <div class="bg-gradient-dark text-white" style="width:20px;height:20px;border-radius:10px;display:inline-block;padding-top:0px;padding-left:5px;">1</div>
            Student Information
        </h6>
        <div class="col-lg-4">
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Full Name*</label>
                <?= $form->field($model, 'name')->textInput([
                        'maxlength' => true,
                        'class'=>'form-control rounded-4 border-0',
                        'placeholder' => 'John Doe'
                ])->label(false) ?>
            </div>
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Picture - Optional*</label>
                <?= $form->field($model, 'photo')->fileInput([
                    'class'=>'form-control rounded-4 border-0',
                    'placeholder' => 'Upload employee photo'
                ])->label(false) ?>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Mobile No for SMS/WhatsApp*</label>
                <?= $form->field($model, 'mobile')->textInput([
                    'maxlength' => true,
                    'class'=>'form-control rounded-4 border-0',
                    'placeholder' => 'Ex: +998*********'
                ])->label(false) ?>
            </div>
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Full Name*</label>

                <?= $form->field($model, 'date_of_joining')->input('date', [
                    'class' => 'form-control rounded-4 border-0',
                ])->label(false) ?>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Employee Role*</label>
                <?= $form->field($model, 'role')->dropDownList(
                    $employeeRole,
                    [
                        'prompt' => 'Select Role',
                        'class' => 'form-control rounded-4 border-0',
                    ]
                )->label(false) ?>
            </div>
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Email*</label>
                <?= $form->field($model, 'email')->textInput([
                    'maxlength' => true,
                    'class'=>'form-control rounded-4 border-0',
                    'placeholder' => 'Ex: someone@school.io'])->label(false) ?>
            </div>
        </div>
    </div>
    <div class="row" style="border:0px solid #9698d6;padding:5px 5px 5px 15px;">
        <h6 class="w-100 py-2" style="border-bottom:1px solid #999;">
            <div class="bg-gradient-dark text-white" style="width:20px;height:20px;border-radius:10px;display:inline-block;padding-top:0px;padding-left:5px;">2</div>
            Other Information
        </h6>
        <div class="col-lg-4">
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">National Id*</label>
                <?= $form->field($model, 'national_id')->textInput([
                    'maxlength' => true,
                    'class'=>'form-control rounded-4 border-0',
                    'placeholder' => 'AC 4561235'
                ])->label(false) ?>
            </div>
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Date Of Birth*</label>
                <?= $form->field($model, 'date_of_birth')->input( 'date', [
                    'maxlength' => true,
                    'class'=>'form-control rounded-4 border-0',
                    'placeholder' => 'AC 4561235'
                ])->label(false) ?>
            </div>
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Education*</label>
                <?= $form->field($model, 'education')->textInput([
                    'class'=>'form-control rounded-4 border-0',
                    'placeholder' => 'Ex: Tashkent State University'
                ])->label(false) ?>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Gender*</label>
                <?= $form->field($model, 'gender')->dropDownList(
                    $genderOptions,
                    [
                        'prompt' => 'Select Gender',
                        'class' => 'form-control rounded-4 border-0',
                    ]
                )->label(false) ?>


            </div>
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Religion*</label>
                <?= $form->field($model, 'religion')->dropDownList(
                    $religionOptions,
                    [
                        'prompt' => 'Select Religion',
                        'class' => 'form-control rounded-4 border-0',
                    ]
                )->label(false) ?>
            </div>
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Blood Group*</label>
                <?= $form->field($model, 'blood_group')->dropDownList(
                    $bloodGroupOptions,
                    [
                        'prompt' => 'Select Religion',
                        'class' => 'form-control rounded-4 border-0',
                    ]
                )->label(false) ?>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Experience*</label>
                <?= $form->field($model, 'experience')->textInput([
                    'maxlength' => true,
                    'class'=>'form-control rounded-4 border-0',
                    'placeholder' => 'Ex: n years'])->label(false) ?>
            </div>
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Monthly Salary*</label>
                <?= $form->field($model, 'salary')->input('number', [
                    'maxlength' => true,
                    'class'=>'form-control rounded-4 border-0',
                    'placeholder' => 'Monthly Salary'])->label(false) ?>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="m-div">
                <label class="m-label bg-gradient-blue text-white position-absolute">Home Address*</label>
                <?= $form->field($model, 'home_address')->textInput([
                    'maxlength' => true,
                    'class'=>'form-control rounded-4 border-0',
                    'placeholder' => 'Ex: New York, St: North Avenue, st: 2'])->label(false) ?>
            </div>
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
