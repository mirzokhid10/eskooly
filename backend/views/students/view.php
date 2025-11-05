<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Students $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php
$this->registerJsFile('https://cdn.jsdelivr.net/npm/chart.js', ['depends' => [\yii\web\JqueryAsset::class]]);
?>

<div class="students-view">

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">


                    <!-- Page-body start -->
                    <div class="page-body">
                        <!-- Row start -->
                        <div class="row position-relative border-light-subtle">
                            <div class="col-12 f-14 d-flex align-items-center justify-content-between border-light-subtle" style="padding: 10px; border-radius:10px;background:#fff; display: flex; align-items: center">
                                <div class="d-flex align-items-center gap-2">
                                    <strong style="border-right:1px solid #777;padding-right:10px;margin-right:10px;">
                                        Students
                                    </strong>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15" style="display:block;">
                                        <path fill="#000000" fill-rule="evenodd" d="M7.08.222a.6.6 0 0 1 .84 0l6.75 6.64a.6.6 0 0 1-.84.856L13 6.902V12.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5V6.902l-.83.816a.6.6 0 1 1-.84-.856L7.08.222Zm.42 1.27L12 5.918V12h-2V8.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V12H3V5.918l4.5-4.426ZM7 12h2V9H7v3Z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>- Student Report</span>
                                </div>
                                <div style="float:right;">
                                    <button class="btn btn-primary rounded-4 bg-gradient-blue text-white" type="button" title="Show Search Options" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="padding: 0 20px">
                                        <i class="fa-solid fa-file"></i> Get PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row rounded-4 canvas_div_pdf mt-3">
                            <div class="col-lg-3 col-md-12 text-center rounded-4 mb-1 border-light-subtle" style="background:#fff; box-shadow: 0px 0px 1px 1px gray;">
                                <div class="pt-3">
                                    <img class="img-fluid rounded-circle mx-auto"
                                         src="<?= empty($model->photo) || !file_exists(Yii::getAlias('@webroot/' . $model->photo))
                                             ? Url::to('@web/assets/images/' . ($model->gender === 'Male' ? 'male.png' : 'female.png'))
                                             : Url::to('@web/' . $model->photo) ?>"
                                         alt="Student photo"
                                         style="width:140px; height:140px;border:6px solid #f6f7fb;box-shadow:0px 0px 3px 8px #f6f7fb;padding:1px;">
                                </div>

                                <div class="py-4">
                                    <h4 class="gradient-blue m-0 fs-3" style="line-height:22px;"><?= Html::encode($model->name) ?></h4>

                                </div>
                                <div class="text-left p-3 rounded-4" style="background:#f6f7fb;">
                                    <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Registration No</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->name) ?></strong>
                                    </div>
                                    <div style="position:relative;line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Date of Admission</span><br>
                                        <strong class="view_sidebar_response"><?= Yii::$app->formatter->asDate($model->data_admission, 'php:d F, Y') ?></strong>
                                    </div>
                                    <div style="position:relative;line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request" >Class</span><br>
                                        <strong class="view_sidebar_response">
                                            <?= Html::encode($model->class->name) ?>
                                        </strong>
                                    </div>
                                    <div style="position:relative;line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Teacher's Name</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->guardian_name) ?></strong>
                                    </div>
                                    <div style="position:relative;line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request" >Discount in Fee</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->discount_fee) ?> %</strong>
                                    </div>

                                </div>
                                <div class="text-left p-3">
                                    <div class="view_sidebar_line" >
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Date Of Birth</span><br>
                                        <strong class="view_sidebar_response"><?= Yii::$app->formatter->asDate($model->date_of_birth, 'php:d F, Y') ?></strong>
                                    </div>
                                    <div class="view_sidebar_line" >
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Gender</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->gender) ?></strong>
                                    </div>
                                    <div class="view_sidebar_line" >
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Phone Number?</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->phone) ?></strong>
                                    </div>
                                    <div class="view_sidebar_line" >
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Status</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode(ucfirst($model->status)) ?></strong>
                                    </div>
                                    <div class="view_sidebar_line" >
                                        <img src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png" class="view_sidebar_line_image">
                                        <span class="view_sidebar_request">Level</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->level) ?></strong>
                                    </div>
                                    <div class="view_sidebar_line" >
                                        <img src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png" class="view_sidebar_line_image">
                                        <span class="view_sidebar_request">Prefered Language</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->preferred_language) ?></strong>
                                    </div>
                                    <div class="view_sidebar_line" >
                                        <img src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png" class="view_sidebar_line_image">
                                        <span class="view_sidebar_request">Teacher's Contact</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->guardian_contact) ?></strong>
                                    </div>

                                    <div class="view_sidebar_line" >
                                        <img src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png" class="view_sidebar_line_image">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Any Additional Note</span><br>
                                        <strong class="view_sidebar_response">No Data Provided</strong>
                                    </div>
                                </div>
                                <div class="text-left p-3 rounded-4" style="background:#f6f7fb;">
                                    <div class="view_sidebar_line">
                                        <img src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png" style="position:absolute;left:0px;top:16px;height:14px;">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Father Name</span><br>
                                        <strong class="view_sidebar_response">No Data Provided</strong>
                                    </div>
                                    <div class="view_sidebar_line">
                                        <img src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png" style="position:absolute;left:0px;top:16px;height:14px;">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Mother Name</span><br>
                                        <strong class="view_sidebar_response">No Data Provided</strong>
                                    </div>
                                    <div class="view_sidebar_line">
                                        <img src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png" style="position:absolute;left:0px;top:16px;height:14px;">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Address</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->address) ?></strong>
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-9 col-md-12 rounded-4 mb-0 bg-transparent" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6 class="w-100">
                                            <div class="bg-gradient-blue text-white view_middle_block_title_order">1</div>
                                            <strong class="gradient-blue view_middle_block_title">Attendance Report </strong>
                                        </h6>
                                        <div class="row rounded-4 mb-4 bg-white p-2 border-light-subtle ms-2 bg-white" >
                                            <div class="col-5 p-0 text-white ">
                                                <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                </div>
                                                <canvas id="myPieChart" width="216" height="216" style="display: block; height: 173px; width: 173px;"></canvas>
                                            </div>

                                            <div class="col-3 p-0 text-center">
                                                <div class="block1 m-0 p-0 text-white mx-auto">
                                                    <div class="box1" style="background:#ff808b;">
                                                        <p class="number1 p-0 m-0">
                                                            <span class="num1">34</span>
                                                            <span class="sub1">%</span>
                                                        </p>
                                                        <p class="title1 p-0 m-0">Overall</p>
                                                    </div>
                                                    <span class="dots1"></span>
                                                    <svg class="svg1">
                                                        <defs>
                                                            <linearGradient id="gradientStyle">
                                                                <stop offset="0%" stop-color="#ff808b" />
                                                                <stop offset="100%" stop-color="#9698d6" />
                                                            </linearGradient>
                                                        </defs>
                                                        <circle class="circle1" cx="55" cy="55" r="39" />
                                                    </svg>
                                                </div>
                                                <button class="btn btn-sm view_middle_block_button">
                                                    <font style="font-size:10px;font-weight:bold;" class="m-gray">NOT MARKED</font>
                                                    <span class="m-gray" style="position:absolute;top:-7px;left:5px;background:#fff;font-size:9px;padding:none;padding-left:4px; padding-right:4px;border-radius:10px;line-height:12px;border:1px solid #999;"><span class="bg-m-gray badge" style="padding:3px;"></span> Today</span>
                                                </button>

                                            </div>
                                            <div class="col-3 p-0">
                                                <div class="block2 m-0 p-0 text-white mx-auto">
                                                    <div class="box2" style="background:#ff808b;">
                                                        <p class="number2 p-0 m-0">
                                                            <span class="num2">0</span>
                                                            <span class="sub2">%</span>
                                                        </p>
                                                        <p class="title2 p-0 m-0">Nov 2025</p>
                                                    </div>
                                                    <span class="dots1"></span>
                                                    <svg class="svg1">
                                                        <defs>
                                                            <linearGradient id="gradientStyle">
                                                                <stop offset="0%" stop-color="#ff808b" />
                                                                <stop offset="100%" stop-color="#9698d6" />
                                                            </linearGradient>
                                                        </defs>
                                                        <circle class="circle2" cx="55" cy="55" r="39" />
                                                    </svg>
                                                </div>
                                                <button class="btn btn-sm view_middle_block_button" style="border:1px solid #999;border-radius:15px;width:100%;text-align:center;padding:3px;font-size:10px;position:relative;padding-top:5px;background:#FFFFF7;">
                                                    <font class="m-gray">NOT MARKED</font>
                                                    <span class="m-gray"><span class="bg-m-gray badge" style="padding:3px;"></span> Yesterday</span>
                                                </button>
                                            </div>
                                            <div class="col-12 text-white" style="margin-top:8px;margin-bottom:10px;">
                                                <div class="row" style="padding-left:4px;padding-right:4px;">
                                                    <div class="col-4" style="padding:4px;">
                                                        <div class="bg-m-blue1" style="border-radius:6px;">
                                                            <div class="m-white" style="padding:8px;padding-left:10px;padding-right:10px;">
                                                                <h6 class="f-12"style="margin-bottom:0px;">PRESENTS</h6>
                                                                <h3 class="f-16 m-t-0 m-b-0" style="line-height:20px;">
                                                                    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                                                                    <lord-icon
                                                                            src="https://cdn.lordicon.com/zmkotitn.json"
                                                                            trigger="loop"
                                                                            delay="2000"
                                                                            colors="primary:#ffffff"
                                                                            style="width:20px;height:20px;display:inline-block;">
                                                                    </lord-icon>
                                                                    <span  style="display:inline-block;float:right;">1</span></h3>
                                                                <p class="m-b-0 m-t-0" style="font-size:9px;">This Month<span class="f-right">0</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4" style="padding:4px;">
                                                        <div class="bg-m-gray" style="border-radius:6px;">
                                                            <div class="m-white" style="padding:8px;padding-left:10px;padding-right:10px;">
                                                                <h6 class="f-12"style="margin-bottom:0px;">LEAVES</h6>
                                                                <h3 class="f-16 m-t-0 m-b-0" style="line-height:20px;">
                                                                    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                                                                    <lord-icon
                                                                            src="https://cdn.lordicon.com/zmkotitn.json"
                                                                            trigger="loop"
                                                                            delay="2100"
                                                                            colors="primary:#ffffff"
                                                                            style="width:20px;height:20px;display:inline-block;">
                                                                    </lord-icon>
                                                                    <span  style="display:inline-block;float:right;">1</span></h3>
                                                                <p class="m-b-0 m-t-0" style="font-size:9px;">This Month<span class="f-right">0</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4" style="padding:4px;">
                                                        <div class="bg-m-orange" style="border-radius:6px;">
                                                            <div class="m-white" style="padding:8px;padding-left:10px;padding-right:10px;">
                                                                <h6 class="f-12"style="margin-bottom:0px;">ABSENTS</h6>
                                                                <h3 class="f-16 m-t-0 m-b-0" style="line-height:20px;">
                                                                    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                                                                    <lord-icon
                                                                            src="https://cdn.lordicon.com/zmkotitn.json"
                                                                            trigger="loop"
                                                                            delay="2200"
                                                                            colors="primary:#ffffff"
                                                                            style="width:20px;height:20px;display:inline-block;">
                                                                    </lord-icon>
                                                                    <span  style="display:inline-block;float:right;">1</span></h3>
                                                                <p class="m-b-0 m-t-0" style="font-size:9px;">This Month<span class="f-right">0</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="w-100">
                                            <div class="bg-gradient-blue text-white view_middle_block_title_order">2</div>
                                            <strong class="gradient-blue view_middle_block_title">Class Tests Report </strong>
                                        </h6>
                                        <div class="row mt-3 mb-4 rounded-4 bg-white p-2 border-light-subtle ms-2 view_middle_block_test_report">
                                            <div class="col-12 p-0">
                                                <div class="row m-3 p-2 pb-0 rounded-4 bg-white">
                                                    <div class="col-8 p-0" style="line-height:16px; font-size: 16px; color: #9698d6 !important; ">
                                                        <strong class="f-16"><i class="fa-solid fa-book-open"></i> Present Tense</strong><br>
                                                        <div class="" style="margin-top:5px;margin-bottom:5px;">
<!--                                                            <strong class="f-14 m-orange" style="display:inline-block;">27%</strong>-->
                                                            <div style="margin-top:5px;margin-bottom:5px;">
                                                                <strong class="d-inline-block" style="font-size: 14px; color: orangered">27 %</strong>
                                                                <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                                    <div class="progress-bar bg-danger" style="width: 100%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="bg-danger badge " style="padding:5px; font-size: 10px;"></span> <b style="font-size: 10px;">TOTAL CLASS TESTS</b> (<strong class="m-orange f-12 " style="font-size: 12px;">1</strong>)<br>
                                                        <span class="bg-gradient-blue badge" style="padding:5px; font-size: 10px;"></span> <b style="font-size: 10px;">TOTAL MARKS</b> (<strong class="m-gray f-12 " style="font-size: 12px;">285</strong>)<br>
                                                        <span class="bg-primary badge" style="padding:5px; font-size: 10px;"></span> <b style="font-size: 10px;">OBTAINED  MARKS</b> (<strong class="m-blue1 f-12 " style="font-size: 12px;">75</strong>)
                                                    </div>
                                                    <div class="col-4 p-0">
                                                        <div class="block1 m-0 p-0 text-white mx-auto">
                                                            <div class="box1" style="background:#ff808b;">
                                                                <p class="number1 p-0 m-0">
                                                                    <span class="num1">27</span>
                                                                    <span class="sub1">%</span>
                                                                </p>
                                                                <p class="title1 p-0 m-0">Score</p>
                                                            </div>
                                                            <span class="dots1"></span>
                                                            <svg class="svg1">
                                                                <defs>
                                                                    <linearGradient id="gradientStyle">
                                                                        <stop offset="0%" stop-color="#ff808b" />
                                                                        <stop offset="100%" stop-color="#9698d6" />
                                                                    </linearGradient>
                                                                </defs>
                                                                <circle class="circle1" cx="55" cy="55" r="39" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="w-100">
                                            <div class="bg-gradient-blue text-white view_middle_block_title_order">3</div>
                                            <strong class="gradient-blue view_middle_block_title">Examination Report </strong>
                                        </h6>
                                        <div class="row rounded-4 mb-4 bg-white p-2 border-light-subtle ms-2 bg-white" style="color: #9698d6 !important;">
                                            <div class="col-12 text-center">
                                                <p class="text-center m-gray f-12 mt-3">
                                                    <img class="mx-auto" src="<?= Yii::getAlias('@web') ?>/assets/icons/nodatefound.webp" style="width:200px;">

                                                    <strong>
                                                        <i class="fa-solid fa-magnifying-glass"></i> No Record Found.
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>
                                        <h6 class="w-100">
                                            <div class="bg-gradient-blue text-white view_middle_block_title_order">4</div>
                                            <strong class="gradient-blue view_middle_block_title">Free Report </strong>
                                        </h6>
                                        <div class="row mt-3 rounded-4 bg-white border-light-subtle" style="padding:5px;background:#fff;margin-left:5px;box-shadow:0px 0px 1px 0px gray;">
                                            <div class="col-12 p-0">
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                                Accordion Item #1
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item’s accordion body.</div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                                Accordion Item #2
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item’s accordion body. Let’s imagine this being filled with some actual content.</div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                                Accordion Item #3
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item’s accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>-->
<!--        --><?php //= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->

<!--    --><?php //= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'name',
//            'email:email',
//            'phone',
//            'date_of_birth',
//            'photo',
//            'enrollment_date',
//            'status',
//            'level',
//            'last_login',
//         ],
//    ]) ?>



<script>
    // ✅ When page fully loaded
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('myPieChart');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow'],
                datasets: [{
                    label: 'Test Data',
                    data: [10, 20, 30],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)'
                    ]
                }]
            }
        });
    });
</script>
