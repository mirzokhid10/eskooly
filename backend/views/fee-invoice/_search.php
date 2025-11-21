<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Search\FeeInvoiceSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fee-invoices-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bank_logo') ?>

    <?= $form->field($model, 'bank_name') ?>

    <?= $form->field($model, 'bank_address') ?>

    <?= $form->field($model, 'bank_account') ?>

    <?php // echo $form->field($model, 'instruction') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
