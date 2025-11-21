<?php

use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;
use \yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var backend\models\StudentPaymentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Payments';
?>

<div class="student-payments-index">

    <?=$this->render('@app/views/layouts/_pageTopStructure.php')?>
    <?= $this->render('@app/views/layouts/_pageTitle', [
        'title' => $this->title,
        'subtitle' => ' Account statement',
    ]) ?>

    <div class="row mt-4">
        <div class="col-lg-12 px-0">
            <div class="card shadow rounded-4 p-3 bg-white">
                <div class="card-body">
<!--                    <div class="float-left">-->
<!--                        <form id="classFilterForm" method="get" action="">-->
<!--                            <select name="class_id" class="form-control selectric" onchange="$('#classFilterForm').submit()">-->
<!--                                <option value="">All Classes</option>-->
<!--                                --><?php //foreach ($classes as $class): ?>
<!--                                    <option value="--><?php //= $class['id'] ?><!--" --><?php //= $selectedClass == $class['id'] ? 'selected' : '' ?><!-->-->
<!--                                        --><?php //= htmlspecialchars($class['name']) ?>
<!--                                    </option>-->
<!--                                --><?php //endforeach; ?>
<!--                            </select>-->
<!--                        </form>-->
<!--                    </div>-->
                    <div class="table-responsive">
                        <table class="table table-striped align-middle datatable">
                            <thead class="table-light">
                            <tr>
                                <th class="text-start">Name</th>
                                <th class="text-start">Reg Number</th>
                                <th class="text-start">Class</th>
                                <th class="text-start">Phone</th>
                                <th class="text-start">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($dataProvider->getModels() as $student): ?>
                                <tr>
                                    <td class="text-start">
                                        <a href="<?= Url::to(['students/view', 'id' => $student->id]) ?>">
                                            <?= Html::encode($student->name) ?>
                                        </a>
                                    </td>

                                    <td class="text-start"><?= Html::encode($student->registration_number) ?></td>

                                    <td class="text-start"><?= Html::encode($student->class->name ?? '-') ?></td>

                                    <td class="text-start"><?= Html::encode($student->phone) ?></td>
                                    <td class="text-start">
                                        <span class="badge bg-info">
                                            <?= Html::encode($student->paymentStatus) ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <?= Html::a('Pay', ['student-payments/create', 'id' => $student->id], ['class' => 'btn btn-success btn-sm']) ?>
                                        <?= Html::a('View', ['student-payments/view', 'id' => $student->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                        <?= Html::a('History', ['student-payments/history', 'id' => $student->id], ['class' => 'btn btn-warning btn-sm']) ?>
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
    <?=$this->render('@app/views/layouts/_pageBottomStructure.php')?>
</div>
