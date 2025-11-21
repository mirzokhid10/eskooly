<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Employees $model */
/** @var common\models\Employees $genderOptions */
/** @var common\models\Employees $religionOptions */
/** @var common\models\Employees $bloodGroupOptions */
/** @var common\models\Employees $employeeRole */

$this->title = 'Update Employees: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employees-update">

    <?= $this->render('_form', [
        'model' => $model,
        'employeeRole' => $employeeRole,
        'genderOptions' => $genderOptions,
        'religionOptions' => $religionOptions,
        'bloodGroupOptions' => $bloodGroupOptions
    ]) ?>

</div>
