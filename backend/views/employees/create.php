<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Employees $model */
/** @var common\models\Employees $genderOptions */
/** @var common\models\Employees $religionOptions */
/** @var common\models\Employees $bloodGroupOptions */
/** @var common\models\Employees $employeeRole */


$this->title = 'Create Employees';
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-create">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row position-relative">
                            <div class="col-12 f-14 d-flex align-items-center justify-content-between" style="padding: 10px; border-radius:10px;background:#fff;box-shadow:0px 0px 1px 0px gray; display: flex; align-items: center">
                                <div class="d-flex align-items-center gap-2">
                                    <strong style="border-right:1px solid #777;padding-right:10px;margin-right:10px;">
                                        Employees
                                    </strong>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15" style="display:block;">
                                        <path fill="#000000" fill-rule="evenodd" d="M7.08.222a.6.6 0 0 1 .84 0l6.75 6.64a.6.6 0 0 1-.84.856L13 6.902V12.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5V6.902l-.83.816a.6.6 0 1 1-.84-.856L7.08.222Zm.42 1.27L12 5.918V12h-2V8.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V12H3V5.918l4.5-4.426ZM7 12h2V9H7v3Z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>- Create An Employee </span>
                                </div>
                            </div>
                        </div>

                        <?= $this->render('_form', [
                            'model' => $model,
                            'employeeRole' => $employeeRole,
                            'genderOptions' => $genderOptions,
                            'religionOptions' => $religionOptions,
                            'bloodGroupOptions' => $bloodGroupOptions
                        ]) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
