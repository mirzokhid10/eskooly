<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Students $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="students-form row mt-4">
    <div class="col-md-12 col-lg-12 rounded-4 bg-white p-4">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
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
                    <label class="m-label bg-gradient-blue text-white position-absolute">Registration Number*</label>
                    <?= $form->field($model, 'registration_number')->textInput([
                        'maxlength' => true,
                        'class'=>'form-control rounded-4 border-0',
                        'placeholder' => 'REG1234'
                    ])->label(false) ?>
                </div>
                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Image Of Students*</label>
                    <?= $form->field($model, 'photo')->fileInput([
                        'class'=>'form-control rounded-4 border-0',
                        'placeholder' => 'Upload student photo'
                    ])->label(false) ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Phone Number*</label>
                    <?= $form->field($model, 'phone')->textInput([
                        'maxlength' => true,
                        'class'=>'form-control rounded-4 border-0',
                        'placeholder' => '+998901234567'
                    ])->label(false) ?>
                </div>

                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Email*</label>
                    <?= $form->field($model, 'email')->textInput([
                        'maxlength' => true,
                        'class'=>'form-control rounded-4 border-0',
                        'placeholder' => 'student@mail.com'
                    ])->label(false) ?>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Gender</label>
                    <?= $form->field($model, 'gender')->dropDownList(
                        ['Male' => 'Male', 'Female' => 'Female'],
                        ['prompt' => 'Select Gender', 'class'=>'form-control rounded-4 border-0']
                    )->label(false) ?>
                </div>

                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Date of Birth</label>
                    <?= $form->field($model, 'date_of_birth')->input('date', [
                        'class'=>'form-control rounded-4 border-0',
                        'placeholder' => 'Select date of birth'
                    ])->label(false) ?>
                </div>
            </div>
        </div>

        <div class="row my-4" style="border:0px solid #9698d6;padding:5px 5px 5px 15px;">

            <h6 class="w-100 py-2" style="border-bottom:1px solid #999;">
                <div class="bg-gradient-dark text-white" style="width:20px;height:20px;border-radius:10px;display:inline-block;padding-top:0px;padding-left:5px;">2</div>
                Other Information
            </h6>

            <div class="col-lg-4">
                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Select Class*</label>
                    <?= $form->field($model, 'class_id')->dropDownList(
                        $classes,
                        ['prompt' => 'Select Class', 'class' => 'form-control rounded-4 border-0']
                    )->label(false) ?>
                </div>

                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Guardian Name</label>
                    <?= $form->field($model, 'guardian_name')->textInput([
                        'maxlength' => true,
                        'class'=>'form-control rounded-4 border-0',
                        'placeholder' => 'Enter guardian full name'
                    ])->label(false) ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Guardian Contact</label>
                    <?= $form->field($model, 'guardian_contact')->textInput([
                        'maxlength' => true,
                        'class'=>'form-control rounded-4 border-0',
                        'placeholder' => 'Enter guardian phone number'
                    ])->label(false) ?>
                </div>

                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Address*</label>
                    <?= $form->field($model, 'address')->textInput([
                        'maxlength' => true,
                        'class'=>'form-control rounded-4 border-0',
                        'placeholder' => 'Enter home address'
                    ])->label(false) ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Discount Fee*</label>
                    <?= $form->field($model, 'discount_fee')->input('number', [
                        'class'=>'form-control rounded-4 border-0',
                        'min' => 0,
                        'max' => 100,
                        'placeholder' => 'Enter discount percentage (e.g., 10)'
                    ])->label(false) ?>
                </div>

                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Date of Admission*</label>
                    <?= $form->field($model, 'data_admission')->input('date', [
                        'class'=>'form-control rounded-4 border-0',
                        'placeholder' => 'Select admission date'
                    ])->label(false) ?>
                </div>
            </div>
        </div>

        <div class="row" style="border:0px solid #9698d6;padding:5px 5px 5px 15px;">
            <h6 class="w-100 py-2" style="border-bottom:1px solid #999;">
                <div class="bg-gradient-dark text-white" style="width:20px;height:20px;border-radius:10px;display:inline-block;padding-top:0px;padding-left:5px;">3</div>
                Additional Information
            </h6>

            <div class="col-lg-4">
                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Status</label>
                    <?= $form->field($model, 'status')->dropDownList(
                        ['active' => 'Active', 'graduated' => 'Graduated', 'dropped' => 'Dropped'],
                        ['prompt' => 'Select Status', 'class'=>'form-control rounded-4 border-0']
                    )->label(false) ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Preferred Language</label>
                    <?= $form->field($model, 'preferred_language')->dropDownList(
                        ['EN' => 'English', 'UZ' => 'Uzbek', 'RU' => 'Russian'],
                        ['prompt' => 'Select Preferred Language', 'class'=>'form-control rounded-4 border-0']
                    )->label(false) ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Level</label>
                    <?= $form->field($model, 'level')->dropDownList(
                        ['Beginner' => 'Beginner', 'Intermediate' => 'Intermediate', 'Advanced' => 'Advanced'],
                        ['prompt' => 'Select Student Level', 'class'=>'form-control rounded-4 border-0']
                    )->label(false) ?>
                </div>
            </div>
        </div>

        <div class="form-group my-5 d-flex justify-content-center gap-3">
            <?= Html::a('↻ Reset', ['create'], ['class'=>'btn btn-warning rounded-4 px-4']) ?>
            <?= Html::submitButton(
                $model->isNewRecord ? '✓ Submit' : '✎ Update',
                ['class'=>'btn submit btn-primary rounded-4 px-4']
            ) ?>
        </div>

        <!-- MULTI CLASS SELECTION -->


        <?php ActiveForm::end(); ?>
    </div>
</div>
<script>
    // $('#students-class_id').on('change', function () {
    //     let classId = $(this).val();
    //     if (classId) {
    //         $.get('/classes/get-teacher', { id: classId }, function (data) {
    //             if (data.success) {
    //                 $('#students-guardian_name').val(data.name);
    //                 $('#students-guardian_contact').val(data.phone);
    //             } else {
    //                 $('#students-guardian_name').val('');
    //                 $('#students-guardian_contact').val('');
    //             }
    //         });
    //     } else {
    //         $('#students-guardian_name').val('');
    //         $('#students-guardian_contact').val('');
    //     }
    // });

    document.addEventListener('DOMContentLoaded', function() {
        const classSelect = document.getElementById('students-class_id');
        const guardianName = document.getElementById('students-guardian_name');
        const guardianContact = document.getElementById('students-guardian_contact');

        classSelect.addEventListener('change', function() {
            const classId = this.value;

            if (!classId) {
                guardianName.value = '';
                guardianContact.value = '';
                return;
            }

            fetch(`/classes/get-teacher?id=${classId}`)
                .then(response => response.json())
                .then(data => {
                    // console.log('Response:', data);
                    if (data.success) {
                        guardianName.value = data.name;
                        guardianContact.value = data.phone;
                    } else {
                        guardianName.value = '';
                        guardianContact.value = '';
                    }
                })
                .catch(error => console.error('Error fetching teacher info:', error));
        });
    });
</script>
