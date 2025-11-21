<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\FeeInvoices $model */
use fedemotta\datatables\DataTables;

/** @var yii\web\View $this */
/** @var backend\models\Search\FeeInvoiceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var common\models\FeeInvoices $model */

?>
<div class="fee-invoices-update">
    <div class="row position-relative">
        <div class="col-12 p-3 f-14 d-flex align-items-center gap-2" style="border-radius:10px;background:#fff;box-shadow:0px 0px 1px 0px gray; display: flex; align-items: center">
            <strong style="border-right:1px solid #777;padding-right:10px;margin-right:10px;">
                General Settings
            </strong>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15" style="display:block;">
                <path fill="#000000" fill-rule="evenodd" d="M7.08.222a.6.6 0 0 1 .84 0l6.75 6.64a.6.6 0 0 1-.84.856L13 6.902V12.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5V6.902l-.83.816a.6.6 0 1 1-.84-.856L7.08.222Zm.42 1.27L12 5.918V12h-2V8.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V12H3V5.918l4.5-4.426ZM7 12h2V9H7v3Z" clip-rule="evenodd"/>
            </svg>
            <span>- Updating Banking Details </span>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-4 rounded-4 p-4 mb-4 pt-4 bg-white " style="box-shadow:0px 0px 1px 0px gray;">
            <h4 class="fs-4 fw-bolder text-center text-gray">Add New Bank<br>
                <div class="bg-gradient-blue d-inline-block" style="width:15px;height:6px;border-radius:10px;"></div>
                <span class="m-dblue fw-light d-inline-block" style="font-size: 12px;">Required*</span>
                <div class="bg-gradient-gray m-l-10 d-inline-block" style="width:20px;height:7px;border-radius:10px;"></div>
                <span class="gradient-gray fw-light d-inline-block" style="font-size: 12px;">Optional</span>
            </h4>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
        <div class="col-lg-8">
            <div class="row pt-0 pr-0 ps-4 pb-4" id="p20">
                <div class="col-12 rounded-4  p-4 bg-white" style="box-shadow:0px 0px 1px 0px gray;">
                    <div class="product-index">
                        <?= DataTables::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'tableOptions' => ['class' => 'table bank-data-header-style'],
                            'columns' => [
                                'bank_name',
                                [
                                    'attribute' => 'bank_logo',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return $model->bank_logo
                                            ? Html::img(Yii::getAlias('@web/' . $model->bank_logo), ['style' => 'max-width:40px;max-height:40px;'])
                                            : Html::img('@web/assets/icons/no-logo.jpg', ['style' => 'max-width:40px;max-height:40px;']);
                                    },
                                ],
                                'bank_account',
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => 'Actions',
                                    'template' => '{update} {delete}',
                                    'buttons' => [
                                        'update' => function ($url, $model, $key) {
                                            return Html::a('<i class="fa fa-pencil"></i>', $url, [
                                                'class' => 'btn-action-edit',
                                                'title' => 'Update'
                                            ]);
                                        },
                                        'delete' => function ($url, $model, $key) {
                                            return Html::a('<i class="fa fa-trash"></i>', $url, [
                                                'class' => 'btn-action-delete',
                                                'title' => 'Delete',
                                                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                'data-method' => 'post',
                                            ]);
                                        },
                                    ]
                                ],
                            ],
                            'clientOptions' => [
                                "paging" => true,
                                "lengthChange" => true,
                                "searching" => true,
                                "ordering" => true,
                                "info" => true,
                                "autoWidth" => false,
                                "responsive" => true,
                                "pagingType" => "full_numbers",
                                "lengthMenu" => [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>

</div>
