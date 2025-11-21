<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Accounts';
$this->params['breadcrumbs'][] = $this->title;

// Initialize totals
$totalIncome = 0;
$totalExpense = 0;
$balance = 0;
?>

<div class="transactions-index">

    <?= $this->render('@app/views/layouts/_pageTopStructure.php') ?>
    <?= $this->render('@app/views/layouts/_pageTitle', [
        'title' => $this->title,
        'subtitle' => ' Account statement',
    ]) ?>

    <div class="row mt-4">
        <div class="col-lg-12 px-0">
            <div class="card shadow rounded-4 p-3 bg-white">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped align-middle datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th class="text-end">Debit (Expense)</th>
                                    <th class="text-end">Credit (Income)</th>
                                    <th class="text-end">Running Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataProvider->getModels() as $transaction): ?>
                                    <?php
                                    if ($transaction->type === 'income') {
                                        $totalIncome += $transaction->amount;
                                        $balance += $transaction->amount;
                                    } else {
                                        $totalExpense += $transaction->amount;
                                        $balance -= $transaction->amount;
                                    }
                                    ?>
                                    <tr class="">
                                        <td class="text-secondary">
                                            <?= Html::encode(Yii::$app->formatter->asDate($transaction->date, 'php:d-m-Y')) ?></td>
                                        <td><strong
                                                class="fw-normal text-secondary"><?= Html::encode($transaction->chartAccount->name ?? '-') ?></strong>
                                        </td>

                                        <td class="text-end">
                                            <?= $transaction->type === 'expense' ? '- $' . number_format($transaction->amount, 2) : '' ?>
                                        </td>
                                        <td class="text-end">
                                            <?= $transaction->type === 'income' ? '+ $' . number_format($transaction->amount, 2) : '' ?>
                                        </td>
                                        <td class="text-end <?= $balance >= 0 ? 'text-success' : 'text-danger' ?>">
                                            $ <?= number_format($balance, 2) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <tfoot class="fw-bold border-top">
                                <tr>
                                    <td colspan="2" class="text-end">Totals:</td>
                                    <td class="text-end text-danger">$ <?= number_format($totalExpense, 2) ?></td>
                                    <td class="text-end text-success">$ <?= number_format($totalIncome, 2) ?></td>
                                    <td class="text-end <?= ($totalIncome - $totalExpense) >= 0 ? 'text-success' : 'text-danger' ?>">
                                        $ <?= number_format($totalIncome - $totalExpense, 2) ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->render('@app/views/layouts/_pageBottomStructure.php') ?>
</div>

<?php
$css = <<<CSS
.table td, .table th {
    vertical-align: middle !important;
}
.table-success td {
    background-color: #e8f8f0 !important;
}
.table-warning td {
    background-color: #fff9e6 !important;
}
CSS;
$this->registerCss($css);
?>