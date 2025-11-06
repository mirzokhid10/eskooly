<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\InstituteProfile $model */
/** @var yii\widgets\ActiveForm $form */
/** @var yii\widgets\ActiveForm $fileInput */

$countries = [
    '' => '', // Empty option for the placeholder
    'United States' => 'United States',
    'United Kingdom' => 'United Kingdom',
    'Kazakhstan' => 'Kazakhstan',
    'Uzbekistan' => 'Uzbekistan',
    'Tajikistan' => 'Tajikistan',
    'Kyrgyz' => 'Kyrgyz',
    'Russia' => 'Russia',
];

?>

<div class="institute-profile-index">
    <div class="row position-relative">
        <div class="col-12 p-3 f-14 d-flex align-items-center gap-2" style="border-radius:10px;background:#fff;box-shadow:0px 0px 1px 0px gray; display: flex; align-items: center">
            <strong style="border-right:1px solid #777;padding-right:10px;margin-right:10px;">
                General Settings
            </strong>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15" style="display:block;">
                <path fill="#000000" fill-rule="evenodd" d="M7.08.222a.6.6 0 0 1 .84 0l6.75 6.64a.6.6 0 0 1-.84.856L13 6.902V12.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5V6.902l-.83.816a.6.6 0 1 1-.84-.856L7.08.222Zm.42 1.27L12 5.918V12h-2V8.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V12H3V5.918l4.5-4.426ZM7 12h2V9H7v3Z" clip-rule="evenodd"/>
            </svg>
            <span>- Institute Profile </span>
        </div>
    </div>
</div>

<div class="row">
    <!-- Multiple Open Accordion start -->
    <div class="col-lg-8">
        <h3 class="text-center mt-4 w-100 pb-3 fs-2 fw-bolder" style="line-height:20px;border-bottom:2px solid #fff;">Update Profile
            <br>
            <div class="bg-gradient-blue" style="width:20px;height:7px;border-radius:10px;display:inline-block;"></div>
            <span class="f-12 m-dblue fs-6" style="display:inline-block;font-weight:100;">Required*</span>
            <div class="bg-gradient-gray ml-3" style="width:20px;height:7px;border-radius:10px;display:inline-block;"></div>
            <span class="f-12 gradient-gray fs-6" style="display:inline-block;font-weight:100;">Optional</span>
        </h3>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <!--        <form action="schoolinfo.php" method="post" id="myform" enctype="multipart/form-data">-->
        <div class="row rounded-4">
            <div class="col-lg-6">
                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Institute Logo*</label>
                    <div class="d-flex align-items-center justify-content-start">
                        <?= Html::img(
                            $model->institute_logo ? Yii::getAlias('@web/' . $model->institute_logo) : '@web/assets/icons/no-logo.jpg',
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
                    <label class="m-label bg-gradient-blue text-white position-absolute">Name of Institute*</label>
                    <?= $form->field($model, 'institute_name')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0'])->label(false) ?>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Website</label>
                    <?= $form->field($model, 'institute_website')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0'])->label(false) ?>
                </div>

                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Phone Number*</label>
                <?= $form->field($model, 'institute_phone')->textInput([
                        'maxlength' => true,
                        'class'=>'form-control rounded-4 border-0',
                    ])->label(false) ?>
                </div>

                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Address*</label>
                    <?= $form->field($model, 'institute_address')->textInput([
                        'maxlength' => true,
                        'class'=>'form-control rounded-4 border-0',
                        'placeholder' => 'Enter address'
                    ])->label(false) ?>
                </div>

                <div class="m-div">
                    <label class="m-label bg-gradient-blue text-white position-absolute">Country*</label>
                    <?= $form->field($model, 'institute_country')
                        ->dropDownList(
                            $countries,
                            [
                                'id' => 'searchlist', // Use id attribute from original HTML
                                'class' => 'form-control rounded-4 border-0', // Use class attributes from original HTML
                                'prompt' => 'Select a country', // Optional: Adds a "Select a country" prompt at the top
                            ],
                    )->label(false) ?>
                </div>

            </div>

        </div>
        <h6 class="text-center mt-4">
            <button class="btn bg-c-yellow mt-4 rounded-4 px-3 py-2" id="submitBtn" type="submit"><i class="fa-solid fa-rotate"></i> Update Profile</button>
        </h6>
        <?php ActiveForm::end(); ?>

    </div>
    <!-- Multiple Open Accordion ends -->
    <!-- Single Open Accordion start -->
    <div class="col-lg-4">
        <div class="rounded-4 p-4 mt-4 bg-white border-light-subtle" style="line-height:16px;">
            <div>
                <button class="btn btn-sm bg-gradient-success text-white rounded-4 p-2 ">Profile View</button>
                <div class="text-center">
                    <?= Html::img(
                        $model->institute_logo ? Yii::getAlias('@web/' . $model->institute_logo) : '@web/assets/icons/no-logo.jpg',
                        ['alt' => 'Institute Logo', 'class' => 'rounded-circle m-2 mx-auto', 'style' => 'width:120px; height:120px;']
                    ) ?>
                    <h4 class="text-dark fs-3 fw-bolder mt-3 mb-0" style="line-height:20px;"><?= Html::encode($model->institute_name ) ?></h4>
                    <h6 class="text-gray fw-lighter my-3" style="font-weight:100;">Institute Target Line</h6>
                    <hr class="bg-m-blue1 mb-3" />
                </div>
                <div class="pl-10 pb-3">
                    <div class="position-relative">
                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                        <span class="view_sidebar_request">Phone Number</span><br>
                        <strong class="view_sidebar_response"><?= Html::encode($model->institute_phone ) ?></strong>
                    </div>
                    <div class="position-relative">
                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                        <span class="view_sidebar_request">Email</span><br>
                        <strong class="view_sidebar_response">mxudoyberdiyev21@gmail.com</strong>
                    </div>
                    <div class="position-relative">
                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                        <span class="view_sidebar_request">Website</span><br>
                        <strong class="view_sidebar_response"><?= Html::encode($model->institute_website ) ?></strong>
                    </div>
                    <div class="position-relative">
                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                        <span class="view_sidebar_request">Address</span><br>
                        <strong class="view_sidebar_response"><?= Html::encode($model->institute_address ) ?></strong>
                    </div>
                    <div class="position-relative">
                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                        <span class="view_sidebar_request">Country</span><br>
                        <strong class="view_sidebar_response"><?= Html::encode($model->institute_country ) ?></strong>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Single Open Accordion ends -->
</div>
