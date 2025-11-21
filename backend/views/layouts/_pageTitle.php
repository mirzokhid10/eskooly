<?php

use yii\helpers\Html;

/**
 * @var string $title
 * @var string|null $subtitle
 * @var bool $showLegend
 */
?>


<div class="row position-relative">
    <div class="col-12 p-3 f-14 d-flex align-items-center gap-2" style="border-radius:10px;background:#fff;box-shadow:0px 0px 1px 0px gray; display: flex; align-items: center">
        <strong style="border-right:1px solid #777;padding-right:10px;margin-right:10px;">
            <?= Html::encode($title) ?>
        </strong>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15" style="display:block;">
            <path fill="#000000" fill-rule="evenodd" d="M7.08.222a.6.6 0 0 1 .84 0l6.75 6.64a.6.6 0 0 1-.84.856L13 6.902V12.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5V6.902l-.83.816a.6.6 0 1 1-.84-.856L7.08.222Zm.42 1.27L12 5.918V12h-2V8.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V12H3V5.918l4.5-4.426ZM7 12h2V9H7v3Z" clip-rule="evenodd"/>
        </svg>
        <span>
            <?php if (!empty($subtitle)): ?>
                <div class="page-subtitle"><?= Html::encode($subtitle) ?></div>
            <?php endif; ?>
        </span>
    </div>
</div>

