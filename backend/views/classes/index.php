<?php

use common\models\Classes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\Search\SearchClass $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="classes-index" style="background-color: #F6F7FB">

   <div class="row position-relative">
       <div class="col-12 p-3 f-14 d-flex align-items-center gap-2" style="border-radius:10px;background:#fff;box-shadow:0px 0px 1px 0px gray; display: flex; align-items: center">
           <strong style="border-right:1px solid #777;padding-right:10px;margin-right:10px;">
               Classes
           </strong>
           <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15" style="display:block;">
               <path fill="#000000" fill-rule="evenodd" d="M7.08.222a.6.6 0 0 1 .84 0l6.75 6.64a.6.6 0 0 1-.84.856L13 6.902V12.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5V6.902l-.83.816a.6.6 0 1 1-.84-.856L7.08.222Zm.42 1.27L12 5.918V12h-2V8.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V12H3V5.918l4.5-4.426ZM7 12h2V9H7v3Z" clip-rule="evenodd"/>
           </svg>
           <span>- All Classes</span>
       </div>
   </div>

    <div class="row mt-3 ps-1 ">
        <?php foreach ($dataProvider->models as $class): ?>
            <div class="stats-card col-md-6 col-xl-3 bg-transparent p-2">
                <div class="position-relative bg-white p-4 rounded-4">
                    <div class="card-header-custom">
                        <h6 class="card-title"><?= Html::encode($class->name) ?></h6>
                        <div class="card-actions align-items-center">
                            <a href="<?= Url::to(['classes/update', 'id' => $class->id]) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="#3144de" d="M22 7.24a1 1 0 0 0-.29-.71l-4.24-4.24a1 1 0 0 0-.71-.29a1 1 0 0 0-.71.29l-2.83 2.83L2.29 16.05a1 1 0 0 0-.29.71V21a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .76-.29l10.87-10.93L21.71 8a1.19 1.19 0 0 0 .22-.33a1 1 0 0 0 0-.24a.7.7 0 0 0 0-.14ZM6.83 20H4v-2.83l9.93-9.93l2.83 2.83ZM18.17 8.66l-2.83-2.83l1.42-1.41l2.82 2.82Z"/>
                                </svg>
                            </a>
                            <form action="<?= Url::to(['classes/delete', 'id' => $class->id]) ?>" method="post" style="display:inline;">
                                <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->getCsrfToken()) ?>
                                <button type="submit" class="btn btn-link p-0 border-0 bg-transparent"
                                        onclick="return confirm('Are you sure you want to delete this class?');">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="students-count d-flex align-items-center">
                        <div class="count-section">
                            <div class="count-number">
                                <?= Html::encode($class->students_count ?? 0) ?>
                            </div>
                            <div class="count-label">STUDENTS</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="32" viewBox="0 0 1024 768">
                            <path fill="#3144de" d="M1024 736q0 13-9.5 22.5T992 768t-22.5-9.5T960 736V315L607 492q-40 20-95 20t-95-20L39 303Q0 283 0 255.5T39 209L417 20q40-20 95-20t95 20l378 189q34 17 38 42q1 1 1 4v481zM639 556l193-97v141q0 43-93.5 73.5T512 704t-226.5-30.5T192 600V459l193 97q40 20 127 20t127-20z"/>
                        </svg>
                    </div>

                    <div class="progress-circles">
                        <!-- Boys -->
                        <div class="circle-container">
                            <svg class="circle-svg" viewBox="0 0 100 100">
                                <circle class="circle-bg" cx="50" cy="50" r="40"></circle>
                                <circle class="circle-progress" cx="50" cy="50" r="40"
                                        stroke-dasharray="251.2"
                                        stroke-dashoffset="125.6"></circle>
                                <text class="circle-text-percent" x="50" y="48" text-anchor="middle" dominant-baseline="middle">50%</text>
                                <text class="circle-text-label" x="50" y="65" text-anchor="middle" dominant-baseline="middle">Boys</text>
                            </svg>
                            <div class="circle-count"><?= Html::encode($class->boys_count ?? 0) ?></div>
                        </div>

                        <!-- Girls -->
                        <div class="circle-container">
                            <svg class="circle-svg" viewBox="0 0 100 100">
                                <circle class="circle-bg" cx="50" cy="50" r="40"></circle>
                                <circle class="circle-progress" cx="50" cy="50" r="40"
                                        stroke-dasharray="251.2"
                                        stroke-dashoffset="125.6"></circle>
                                <text class="circle-text-percent" x="50" y="48" text-anchor="middle" dominant-baseline="middle">50%</text>
                                <text class="circle-text-label" x="50" y="65" text-anchor="middle" dominant-baseline="middle">Girls</text>
                            </svg>
                            <div class="circle-count"><?= Html::encode($class->girls_count ?? 0) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col-md-6 col-xl-3">
            <a href="<?= yii\helpers\Url::to(['/classes/create']) ?>">
                <div class="card order-card rounded-5" style="border:2px dotted #3144de;">
                    <div class="card-block d-flex align-items-center justify-content-center p-5" style="color: #3144de;">
                        <h6 class="mb-1"></h6>
                        <h4 class="text-center f-14 d-inline-block align-items-center align-content-center" style="font-weight:500; color: ">
                            <svg xmlns="http://www.w3.org/2000/svg" style="margin: 0 auto" width="30" height="30" viewBox="0 0 20 20"><path fill="#3144de" d="M10 0c.423 0 .766.343.766.766v8.467h8.468a.766.766 0 1 1 0 1.533h-8.468v8.468a.766.766 0 1 1-1.532 0l-.001-8.468H.766a.766.766 0 0 1 0-1.532l8.467-.001V.766A.768.768 0 0 1 10 0Z"/></svg>
                            <br>
                            <span>Add New</span>
                        </h4>
                    </div>
                </div>
            </a>
        </div>

    </div>




</div>
