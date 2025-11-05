<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\FeeParticulars $formModel */
/** @var common\models\FeeParticulars  $feeParticulars */


$this->title = 'Update Fee Particulars';
$this->params['breadcrumbs'][] = ['label' => 'Fee Particulars', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>


<div class="fee-particulars-update">

    <?= $this->render('_form', [
        'model' => $formModel, // CHANGE THIS LINE: pass $formModel as $model to the partial view
        'feeParticulars' => $feeParticulars, // Make sure this is also passed through if _form needs it
    ]) ?>

</div>