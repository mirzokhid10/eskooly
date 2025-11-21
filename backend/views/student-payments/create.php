<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\StudentPayments $model */

$this->title = 'Create Student Payments';
$this->params['breadcrumbs'][] = ['label' => 'Student Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-payments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
