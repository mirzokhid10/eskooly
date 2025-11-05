<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\FeeParticulars $model */
/** @var yii\widgets\ActiveForm $form */
/** @var common\models\FreeForm $formModel */

$feeParticulars = (new \yii\db\Query())
    ->from('fee_particulars')
    ->where(['active' => true])
    ->orderBy(['sort_order' => SORT_ASC])
    ->indexBy('id') // ✅ ensures $id = actual record ID
    ->all();
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
                <span>- Change Fee Particulars </span>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-lg-3"></div>
    <!-- Multiple Open Accordion start -->
    <div class="col-lg-6">
        <h3 class="text-center mt-4 w-100 pb-3 fs-2 fw-bolder" style="line-height:20px;border-bottom:2px solid #fff;">Change Fee Particulars
            <br>
            <div class="bg-gradient-blue" style="width:20px;height:7px;border-radius:10px;display:inline-block;"></div>
            <span class="f-12 m-dblue fs-6" style="display:inline-block;font-weight:100;">Editable*</span>
            <div class="bg-gradient-gray ml-3" style="width:20px;height:7px;border-radius:10px;display:inline-block;"></div>
            <span class="f-12 gradient-gray fs-6" style="display:inline-block;font-weight:100;">Fixed</span>
        </h3>

        <?php $form = ActiveForm::begin(); ?>
        <div class="row m-0">
            <div class="col-md-6 m-div">
                <label class="m-label bg-gradient-red text-white position-absolute">Fee Particulars for*</label>
                <?= $form->field($model, 'target_type')
                    ->dropDownList([
                        'all' => 'All Students',
//                        'class' => 'Specific Class',
//                    'student' => 'Specific Student',
                    ],[
                        'class' => 'form-control rounded-4 border-0 text-[#868e96]',
                    ])->label(false) ?>
            </div>
        </div>
        <table class="table" style="width:100%;border-spacing: 2px;border-collapse: separate;">
            <tbody>
            <!-- ... table headers ... -->
            <?php foreach ($feeParticulars as $id => $particular): ?>
                <?php
                // CHANGE THIS: Use the actual database $id as the array index name
                $labelName = "FreeForm[labels][{$id}]";
                $amountName = "FreeForm[amounts][{$id}]";

                $isLocked = $particular['is_locked'];
                $disabled = $isLocked ? ['readonly' => true, 'disabled' => true] : [];
                $required = !$isLocked ? ['required' => true] : [];
                ?>
                <tr class="m-0">
                    <td class="bg-transparent border-0 p-0">
                        <div class="m-div mt-2">
                            <label class="m-label position-absolute bg-gradient-blue text-white">Particular Label*</label>
                            <?= Html::textInput($labelName, $particular['label'], array_merge([
                                'class' => 'form-control m-field rounded-4 text-[#868e96]',
                            ], $disabled, $required)) ?>
                        </div>
                    </td>
                    <td class="bg-transparent border-0 p-0">
                        <div class="m-div mt-2">
                            <label class="m-label position-absolute bg-gradient-blue text-white">Prefix Amount*</label>
                            <?php
                            $inputValue = '';
                            if ($particular['is_fixed']) {
                                $inputValue = 'Fixed';
                            } elseif (isset($particular['default_amount'])) {
                                $inputValue = $particular['default_amount'];
                            }
                            ?>
                            <?= Html::input('text', $amountName,
                                $inputValue,
                                array_merge([
                                    'class' => 'form-control m-field rounded-4 text-[#868e96]',
                                ], $disabled, $required)) ?>

                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="form-group text-center">
            <?= Html::submitButton('Save Changes', ['class' => 'btn bg-c-yellow text-dark py-2 px-3 rounded-pill']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <div class="col-lg-3"></div>
</div>

