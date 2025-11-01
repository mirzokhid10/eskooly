<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Classes $model */
/** @var array $teachers  */

$this->title = 'Update Classes: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classes-update">


    <?= $this->render('_form', [
        'model' => $model,
        'teachers' => $teachers,
    ]) ?>

</div>
