<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ChartOfAccountSearch $searchModel */
/** @var common\models\ChartOfAccount $model */
/** @var common\models\ChartOfAccount $headTypes */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chart-of-account-index">
    <?=$this->render('@app/views/layouts/_pageTopStructure.php')?>
        <?= $this->render('@app/views/layouts/_pageTitle', [
            'title' => $this->title,
            'subtitle' => 'Chart of accounts',
        ]) ?>

        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12 rounded-4 p-4 mb-4 bg-white" style="box-shadow:0px 0px 1px 0px gray;">
                        <?= $this->render('@app/views/layouts/_formTitle', [
                                'title' => $this->title,
                        ]) ?>
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="m-div">
                            <label class="m-label bg-gradient-blue text-white position-absolute">Head Name*</label>
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0', 'placeholder'=>'Name Of Head*'])->label(false) ?>
                        </div>
                        <div class="m-div">
                            <label class="m-label bg-gradient-blue text-white position-absolute">Head Type*</label>
                            <?= $form->field($model, 'type')->dropDownList(
                                $headTypes,
                                ['prompt' => 'Select*', 'class'=>'form-control rounded-4 border-0']
                            )->label(false) ?>
                        </div>
                        <div class="position-relative mt-4 text-center">
                            <?= Html::submitButton(
                                $model->isNewRecord ? '✓ Save Head' : '✎ Update Head',
                                ['class'=>'btn submit bg-c-yellow mx-auto rounded-4 px-4']
                            ) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12 px-0 ps-4">
                        <div class="card rounded-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped datatable">
                                        <thead>
                                            <tr>
                                                <th>Name Of Head</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($dataProvider->getModels() as $account): ?>
                                            <tr>
                                                <td><?= Html::encode($account->name) ?></td>
                                                <td><strong class="text-secondary"><?= ucfirst(Html::encode($account->type)) ?></strong></td>
                                                <td>
                                                    <?= Html::a('<i class="fa-solid fa-trash mx-auto" ></i>', ['delete', 'id' => $account->id], [
                                                        'class' => 'btn btn-icon btn-danger rounded-circle d-flex justify-content-center align-items-center',
                                                        'style' => 'width:25px; height:25px;',
                                                        'data' => [
                                                            'confirm' => 'Are you sure you want to delete this account?',
                                                            'method' => 'post',
                                                        ],
                                                    ]) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?=$this->render('@app/views/layouts/_pageBottomStructure.php')?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.dataTable').DataTable();
    })
</script>