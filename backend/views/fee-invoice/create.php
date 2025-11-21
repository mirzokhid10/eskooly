<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\FeeInvoices $model */

$this->title = 'Create Fee Invoices';
$this->params['breadcrumbs'][] = ['label' => 'Fee Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fee-invoices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
