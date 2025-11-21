<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\StudentPayments $model */

$this->title = 'Update Student Payments: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Student Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-payments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
