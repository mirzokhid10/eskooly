<?php

use yii\helpers\Html;

?>

<h1 class="text-center mt-2 fs-20 fw-bold">
    <?= Html::encode($this->title) ?>
    <br>
    <div style="width:20px;height:7px;border-radius:10px;display:inline-block; background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;"></div>
    <span class="fs-12" style="display:inline-block;font-weight:100; color:#4d4cac;">Required*</span>
    <div style="width:20px;height:7px;border-radius:10px;display:inline-block; background: linear-gradient(87deg, #8898aa 0, #888aaa 100%) !important;"></div>
    <span class="fs-12" style="display:inline-block;font-weight:100; color:#4d4cac;">Optional</span>
</h1>