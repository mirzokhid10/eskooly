<?php

use common\models\ChartOfAccount;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ChartOfAccountSearch $searchModel */
/** @var common\models\ChartOfAccount $model */
/** @var common\models\ChartOfAccount $headTypes */
/** @var common\models\Transactions $incomeAccounts */
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
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12 rounded-4 p-4 mb-4 bg-white" style="box-shadow:0px 0px 1px 0px gray;">
                        <?= $this->render('@app/views/layouts/_formTitle', [
                            'title' => $this->title,
                        ]) ?>
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="m-div">
                            <label class="m-label bg-gradient-blue text-white position-absolute">Date*</label>
                            <?= $form->field($model, 'date')->input('date', ['value' => date('Y-m-d'), 'maxlength' => true, 'class'=>'form-control rounded-4 border-0', 'placeholder'=>'Name Of Head*'])->label(false) ?>
                        </div>
                        <div class="m-div">
                            <label class="m-label bg-gradient-blue text-white position-absolute">Description*</label>
                            <?= $form->field($model, 'chart_account_id')->dropDownList(
                                $incomeAccounts,
                                ['prompt' => 'Income Description*', 'class'=>'form-control rounded-4 border-0']
                            )->label(false) ?>
                        </div>
                        <div class="m-div">
                            <label class="m-label bg-gradient-blue text-white position-absolute">Amount*</label>
                            <?= $form->field($model, 'amount')->textInput(['maxlength' => true, 'class'=>'form-control rounded-4 border-0', 'placeholder'=>'Income Amount*'])->label(false) ?>
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
            <div class="col-lg-3"></div>
        </div>
        <?=$this->render('@app/views/layouts/_pageBottomStructure.php')?>
    </div>


<?php
$studentsUrl = Url::to(['transactions/students-by-class']);
$script = <<<JS
$('#chart-account-select').on('change', function() {
    var classId = $(this).val();
    var studentDropdown = $('#student-select');
    studentDropdown.html('<option>Loading...</option>');
    
    if (classId) {
        $.getJSON('{$studentsUrl}?class_id=' + classId, function(data) {
            studentDropdown.empty().append('<option value="">Select Student</option>');
            if (data.students && data.students.length > 0) {
                $.each(data.students, function(index, student) {
                    studentDropdown.append('<option value="' + student.id + '">' + student.name + '</option>');
                });
            } else {
                studentDropdown.append('<option value="">No students found</option>');
            }
        });
    } else {
        studentDropdown.html('<option value="">Select Student</option>');
    }
});
JS;

$this->registerJs($script);
?>