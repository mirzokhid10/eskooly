<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Students $model */
/** @var array $classes */

$this->title = 'Update Students: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="students-update">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'classes' => $classes,
    ]) ?>

</div>
