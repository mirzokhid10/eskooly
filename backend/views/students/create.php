<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Students $model */
/** @var array $classes */

$this->title = 'Create Students';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
    <div class="alert alert-<?= $type === 'error' ? 'danger' : $type ?> alert-dismissible fade show" role="alert">
        <?= $message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endforeach; ?>

<div class="students-create">

    <div class="row">
        <div class="col-12 p-3 f-14 d-flex align-items-center gap-2" style="border-radius:10px;background:#fff;box-shadow:0px 0px 1px 0px gray; display: flex; align-items: center">
            <strong style="border-right:1px solid #777;padding-right:10px;margin-right:10px;">
                Students
            </strong>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15" style="display:block;">
                <path fill="#000000" fill-rule="evenodd" d="M7.08.222a.6.6 0 0 1 .84 0l6.75 6.64a.6.6 0 0 1-.84.856L13 6.902V12.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5V6.902l-.83.816a.6.6 0 1 1-.84-.856L7.08.222Zm.42 1.27L12 5.918V12h-2V8.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V12H3V5.918l4.5-4.426ZM7 12h2V9H7v3Z" clip-rule="evenodd"/>
            </svg>
            <span>-  Admission Form</span>
            <a class="f-right" href="#" data-bs-toggle="tooltip" data-original-title="This option is available in Desktop Version only.">
                <button class="d-flex gap-2 align-items-center justify-content-center btn btn-sm bg-m-purple m-white rounded-4 px-3 text-white" style="opacity: 0.8;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="#fff" d="M13 3v9.586l3.5-3.5l1.414 1.414L12 16.414L6.086 10.5L7.5 9.086l3.5 3.5V3h2ZM4.5 14v5h15v-5h2v7h-19v-7h2Z"/></svg>
                    Import Students
                </button>
            </a>
        </div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'classes' => $classes,
    ]) ?>

</div>
