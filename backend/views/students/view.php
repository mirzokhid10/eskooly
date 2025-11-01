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
                            <div class="col-lg-9 col-md-12 m-round" style="background:none;margin-bottom:0px;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6 class="w-100"><div class="bg-gradient-blue m-white" style="width:20px;height:20px;border-radius:10px;display:inline-block;padding-top:3px;padding-left:7px;">1</div> <strong class="gradient-blue f-16">Attendance Report </strong><span style="font-size:12px;" class="f-right"></span></h6>
                                        <div class="row m-round m-b-20" style="border-radius:5px;padding-bottom:10px;background:#FFF;margin-left:5px;padding:5px;box-shadow:0px 0px 1px 0px gray;">

                                            <div class="col-5 p-0" style="padding:0px !important;color:#fff;"><canvas id="pieChart" width="100%" height="100%"></canvas></div>
                                            <div class="col-3 p-0 text-center">
                                                <div class="block1">
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
                                                <button class="btn btn-sm" style="border:1px solid #999;border-radius:15px;width:100%;text-align:center;padding:3px;font-size:10px;position:relative;padding-top:5px;background:#FFFFF7;">
                                                    <font style="font-size:10px;font-weight:bold;" class="m-gray">NOT MARKED</font>
                                                    <span class="m-gray" style="position:absolute;top:-7px;left:5px;background:#fff;font-size:9px;padding:none;padding-left:4px; padding-right:4px;border-radius:10px;line-height:12px;border:1px solid #999;"><span class="bg-m-gray badge" style="padding:3px;"></span> Today</span>
                                                </button>

                                            </div>
                                            <div class="col-3 p-0" style="">
                                                <div class="block2">
                                                    <div class="box2" style="background:#ff808b;">
                                                        <p class="number2 p-0 m-0">
                                                            <span class="num2">0</span>
                                                            <span class="sub2">%</span>
                                                        </p>
                                                        <p class="title2 p-0 m-0">Nov 2025</p>
                                                    </div>
                                                    <span class="dots2"></span>
                                                    <svg class="svg2">
                                                        <defs>
                                                            <linearGradient id="gradientStyle2">
                                                                <stop offset="0%" stop-color="#ff808b" />
                                                                <stop offset="100%" stop-color="#9698d6" />
                                                            </linearGradient>
                                                        </defs>
                                                        <circle class="circle2" cx="55" cy="55" r="39" />
                                                    </svg>
                                                </div>
                                                <button class="btn btn-sm m-l-10" style="border:1px solid #999;border-radius:15px;width:100%;text-align:center;padding:3px;font-size:10px;position:relative;padding-top:5px;background:#FFFFF7;">
                                                    <font style="font-size:10px;font-weight:bold;" class="m-green"><i class="fa fa-check"></i> PRESENT</font>
                                                    <span class="m-gray" style="position:absolute;top:-7px;left:5px;background:#fff;font-size:9px;padding:none;padding-left:4px; padding-right:4px;border-radius:10px;line-height:12px;border:1px solid #999;"><span class="bg-c-green badge" style="padding:3px;"></span> Yesterday</span>
                                                </button>
                                            </div>
                                            <div class="col-12" style="margin-top:8px;margin-bottom:10px;">
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
                                        <h6 class="w-100"><div class="bg-gradient-blue m-white" style="width:20px;height:20px;border-radius:10px;display:inline-block;padding-top:3px;padding-left:6px;">2</div> <strong class="gradient-blue f-16">Class Tests Report </strong><span style="font-size:12px;" class="f-right"></span></h6>
                                        <div class="row m-t-10 m-b-20 m-round" style="padding-bottom:10px;padding:5px;background:#FFF;margin-left:5px;box-shadow:0px 0px 1px 0px gray;">

                                            <div class="col-12 p-0">
                                                <div class="row m-10 p-10 p-b-0 m-round" style="background:#fff;">
                                                    <div class="col-8 m-gray p-0 f-10" style="line-height:15px;">
                                                        <strong class="m-dblue f-16"><i class="ti-book"></i> Present Tense</strong><br>
                                                        <div style="margin-top:5px;margin-bottom:5px;">
                                                            <strong class="f-14 m-orange" style="display:inline-block;">27%</strong>
                                                            <div class="progress" style="height:8px;border-radius:5px;width:90px;display:inline-block;">

                                                                <div class="progress-bar bg-gradient-red f-left" role="progressbar" aria-valuenow="27"
                                                                     aria-valuemin="0" aria-valuemax="100" style="width:27%;border-radius:5px;">

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <span class="bg-m-orange badge" style="padding:5px;"></span> TOTAL <b>CLASS TESTS</b> (<strong class="m-orange f-12">1</strong>)<br>
                                                        <span class="bg-m-gray badge" style="padding:5px;"></span> TOTAL <b>MARKS</b> (<strong class="m-gray f-12">285</strong>)<br>
                                                        <span class="bg-m-blue1 badge" style="padding:5px;"></span> OBTAINED <b>MARKS</b> (<strong class="m-blue1 f-12">75</strong>)
                                                    </div>
                                                    <div class="col-4 p-0">
                                                        <input type="hidden" value="27" id="perval0">
                                                        <div id="progress0">
                                                            <svg viewbox="0 0 110 100">
                                                                <linearGradient id="gradient0" x1="0" y1="0" x2="0" y2="100%">
                                                                    <stop offset="0%" stop-color="#f5365c" />
                                                                    <stop offset="100%" stop-color="#f56036" />
                                                                </linearGradient>
                                                                <path class="grey" d="M30,90 A40,40 0 1,1 80,90" fill='none' />
                                                                <path id="blue" fill='none'  class="blue" d="M30,90 A40,40 0 1,1 80,90" style="stroke: url(#gradient0);"/>

                                                                <text x="50%" y="60%"  dominant-baseline="middle" text-anchor="middle" style="font-size:18px;font-weight:900;">27%</text>
                                                                <text x="50%" y="90%" dominant-baseline="middle" text-anchor="middle" style="font-size:12px;">score</text>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="w-100"><div class="bg-gradient-blue m-white" style="width:20px;height:20px;border-radius:10px;display:inline-block;padding-top:3px;padding-left:6px;">3</div> <strong class="gradient-blue f-16">Examination Report </strong><span style="font-size:12px;" class="f-right"></span></h6>
                                        <div class="row m-round m-t-10 m-b-20" style="padding:5px;background:#fff;margin-left:5px;padding-top:15px;box-shadow:0px 0px 1px 0px gray;">
                                            <div class="col-12 text-center">
                                                <p class="text-center m-gray f-12 m-t-10"><img src="assets/nf.webp" style="width:200px;"><br><strong><i class="ti-search"></i> No Record Found.</strong></p>
                                            </div>
                                        </div>
                                        <h6 class="w-100"><div class="bg-gradient-blue m-white" style="width:20px;height:20px;border-radius:10px;display:inline-block;padding-top:2px;padding-left:5px;">4</div> <strong class="gradient-blue f-16">Fee Report </strong><span style="font-size:12px;" class="f-right"></span></h6>
                                        <div class="row m-t-10 m-round" style="padding:5px;background:#fff;margin-left:5px;box-shadow:0px 0px 1px 0px gray;">
                                            <div class="col-12 p-0">
                                                <div class="row p-10 p-t-20 p-b-20 showfd" style="background:#fff;margin:15px;border-bottom:4px solid #f6f7fb;">
                                                    <div class="col-2 p-0">
                                                        <i class="fa fa-money f-14 bg-m-dblue m-white" style="border-radius:50%;padding:5px;"></i>
                                                    </div>
                                                    <div class="col-8 p-0 p-r-10">
                                                        <strong class="m-dblue f-20 m-b-10" style="font-weight:900;line-height:20px;"><span id="symbol">$</span> 556,346                										                                										                    <span class="bg-c-yellow m-white badge f-10 f-right m-r-10" style="padding:5px;">PARTIALLY PAID</span>
                                                        </strong><br>
                                                        <span class="f-12 m-dblue"  style="line-height:12px;"> Fees of <b>
                										                September, 2025                        												 </b>
                        												 </span>
                                                    </div>
                                                    <div class="col-2 p-0 text-center">
                										                <span id="showfi" class="m-blue1 f-10">
                            									       <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                                                        <lord-icon
                                                                                src="https://cdn.lordicon.com/rxufjlal.json"
                                                                                trigger="loop"
                                                                                delay="3000"
                                                                                colors="primary:#e7e7e8"
                                                                                state="intro"
                                                                                style="width:35px;height:35px">
                                                                        </lord-icon>
                            									       </span>
                                                        <span id="hidefi" class="m-gray">
                            									       <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                                                        <lord-icon
                                                                                src="https://cdn.lordicon.com/xsdtfyne.json"
                                                                                trigger="loop"
                                                                                delay="2000"
                                                                                colors="primary:#e7e7e8"
                                                                                style="width:35px;height:35px">
                                                                        </lord-icon>
                            									       </span>
                                                    </div>
                                                    <div class="col-12 m-dblue p-t-10 p-0 f-10" id="fd" style="border-top:1px solid #4d4cac;line-height:12px;">
                                                        <span class="p-l-10">Submission Date<strong class="f-right m-r-10">08 September, 2025</strong></span><br>
                                                        <span class="p-l-10">Total Amount<strong class="f-right m-r-10"><span id="symbol">$</span> 556346</strong></span><br>
                                                        <span class="p-l-10">Paid Amount<strong class="f-right m-r-10"><span id="symbol">$</span> 5456</strong></span>
                                                        <hr class="m-0 p-0" style="border:none;background-color:#4d4cac;height:1px;margin-top:5px !important;margin-bottom:5px !important;">
                                                        <span class="p-l-10">Remaining Balance<strong class="f-right m-r-10"><span id="symbol">$</span> 550890</strong></span>
                                                    </div>
                                                </div>
                                                <div class="row p-10 p-t-20 p-b-20 showfd" style="background:#fff;margin:15px;border-bottom:4px solid #f6f7fb;">
                                                    <div class="col-2 p-0">
                                                        <i class="fa fa-money f-14 bg-m-dblue m-white" style="border-radius:50%;padding:5px;"></i>
                                                    </div>
                                                    <div class="col-8 p-0 p-r-10">
                                                        <strong class="m-dblue f-20 m-b-10" style="font-weight:900;line-height:20px;"><span id="symbol">$</span> 556,346                										                                										                    <span class="bg-gradient-red m-white badge m-r-10 f-10 f-right" style="padding:5px;">UNPAID</span>
                                                        </strong><br>
                                                        <span class="f-12 m-dblue"  style="line-height:12px;"> Fees of <b>
                										                September, 2025                        												 </b>
                        												 </span>
                                                    </div>
                                                    <div class="col-2 p-0 text-center">
                										                <span id="showfi" class="m-blue1 f-10">
                            									       <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                                                        <lord-icon
                                                                                src="https://cdn.lordicon.com/rxufjlal.json"
                                                                                trigger="loop"
                                                                                delay="3000"
                                                                                colors="primary:#e7e7e8"
                                                                                state="intro"
                                                                                style="width:35px;height:35px">
                                                                        </lord-icon>
                            									       </span>
                                                        <span id="hidefi" class="m-gray">
                            									       <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                                                        <lord-icon
                                                                                src="https://cdn.lordicon.com/xsdtfyne.json"
                                                                                trigger="loop"
                                                                                delay="2000"
                                                                                colors="primary:#e7e7e8"
                                                                                style="width:35px;height:35px">
                                                                        </lord-icon>
                            									       </span>
                                                    </div>
                                                    <div class="col-12 m-dblue p-t-10 p-0 f-10" id="fd" style="border-top:1px solid #4d4cac;line-height:12px;">
                                                        <span class="p-l-10">Submission Date<strong class="f-right m-r-10">30 September, 2025</strong></span><br>
                                                        <span class="p-l-10">Total Amount<strong class="f-right m-r-10"><span id="symbol">$</span> 556346</strong></span><br>
                                                        <span class="p-l-10">Paid Amount<strong class="f-right m-r-10"><span id="symbol">$</span> 0</strong></span>
                                                        <hr class="m-0 p-0" style="border:none;background-color:#4d4cac;height:1px;margin-top:5px !important;margin-bottom:5px !important;">
                                                        <span class="p-l-10">Remaining Balance<strong class="f-right m-r-10"><span id="symbol">$</span> 556346</strong></span>
                                                    </div>
                                                </div>
                                                <div class="row p-10 p-t-20 p-b-20 showfd" style="background:#fff;margin:15px;border-bottom:4px solid #f6f7fb;">
                                                    <div class="col-2 p-0">
                                                        <i class="fa fa-money f-14 bg-m-dblue m-white" style="border-radius:50%;padding:5px;"></i>
                                                    </div>
                                                    <div class="col-8 p-0 p-r-10">
                                                        <strong class="m-dblue f-20 m-b-10" style="font-weight:900;line-height:20px;"><span id="symbol">$</span> 305,400                										                                										                    <span class="bg-c-yellow m-white badge f-10 f-right m-r-10" style="padding:5px;">PARTIALLY PAID</span>
                                                        </strong><br>
                                                        <span class="f-12 m-dblue"  style="line-height:12px;"> Fees of <b>
                										                September, 2025                        												 </b>
                        												 </span>
                                                    </div>
                                                    <div class="col-2 p-0 text-center">
                										                <span id="showfi" class="m-blue1 f-10">
                            									       <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                                                        <lord-icon
                                                                                src="https://cdn.lordicon.com/rxufjlal.json"
                                                                                trigger="loop"
                                                                                delay="3000"
                                                                                colors="primary:#e7e7e8"
                                                                                state="intro"
                                                                                style="width:35px;height:35px">
                                                                        </lord-icon>
                            									       </span>
                                                        <span id="hidefi" class="m-gray">
                            									       <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                                                        <lord-icon
                                                                                src="https://cdn.lordicon.com/xsdtfyne.json"
                                                                                trigger="loop"
                                                                                delay="2000"
                                                                                colors="primary:#e7e7e8"
                                                                                style="width:35px;height:35px">
                                                                        </lord-icon>
                            									       </span>
                                                    </div>
                                                    <div class="col-12 m-dblue p-t-10 p-0 f-10" id="fd" style="border-top:1px solid #4d4cac;line-height:12px;">
                                                        <span class="p-l-10">Submission Date<strong class="f-right m-r-10">08 September, 2025</strong></span><br>
                                                        <span class="p-l-10">Total Amount<strong class="f-right m-r-10"><span id="symbol">$</span> 305400</strong></span><br>
                                                        <span class="p-l-10">Paid Amount<strong class="f-right m-r-10"><span id="symbol">$</span> 54554</strong></span>
                                                        <hr class="m-0 p-0" style="border:none;background-color:#4d4cac;height:1px;margin-top:5px !important;margin-bottom:5px !important;">
                                                        <span class="p-l-10">Remaining Balance<strong class="f-right m-r-10"><span id="symbol">$</span> 250846</strong></span>
                                                    </div>
                                                </div>
                                                <div class="row p-10 p-t-20 p-b-20 showfd" style="background:#fff;margin:15px;border-bottom:4px solid #f6f7fb;">
                                                    <div class="col-2 p-0">
                                                        <i class="fa fa-money f-14 bg-m-dblue m-white" style="border-radius:50%;padding:5px;"></i>
                                                    </div>
                                                    <div class="col-8 p-0 p-r-10">
                                                        <strong class="m-dblue f-20 m-b-10" style="font-weight:900;line-height:20px;"><span id="symbol">$</span> 305,500                										                                										                    <span class="bg-c-yellow m-white badge f-10 f-right m-r-10" style="padding:5px;">PARTIALLY PAID</span>
                                                        </strong><br>
                                                        <span class="f-12 m-dblue"  style="line-height:12px;"> Fees of <b>
                										                September, 2025                        												 </b>
                        												 </span>
                                                    </div>
                                                    <div class="col-2 p-0 text-center">
                										                <span id="showfi" class="m-blue1 f-10">
                            									       <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                                                        <lord-icon
                                                                                src="https://cdn.lordicon.com/rxufjlal.json"
                                                                                trigger="loop"
                                                                                delay="3000"
                                                                                colors="primary:#e7e7e8"
                                                                                state="intro"
                                                                                style="width:35px;height:35px">
                                                                        </lord-icon>
                            									       </span>
                                                        <span id="hidefi" class="m-gray">
                            									       <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                                                        <lord-icon
                                                                                src="https://cdn.lordicon.com/xsdtfyne.json"
                                                                                trigger="loop"
                                                                                delay="2000"
                                                                                colors="primary:#e7e7e8"
                                                                                style="width:35px;height:35px">
                                                                        </lord-icon>
                            									       </span>
                                                    </div>
                                                    <div class="col-12 m-dblue p-t-10 p-0 f-10" id="fd" style="border-top:1px solid #4d4cac;line-height:12px;">
                                                        <span class="p-l-10">Submission Date<strong class="f-right m-r-10">08 September, 2025</strong></span><br>
                                                        <span class="p-l-10">Total Amount<strong class="f-right m-r-10"><span id="symbol">$</span> 305500</strong></span><br>
                                                        <span class="p-l-10">Paid Amount<strong class="f-right m-r-10"><span id="symbol">$</span> 100</strong></span>
                                                        <hr class="m-0 p-0" style="border:none;background-color:#4d4cac;height:1px;margin-top:5px !important;margin-bottom:5px !important;">
                                                        <span class="p-l-10">Remaining Balance<strong class="f-right m-r-10"><span id="symbol">$</span> 305400</strong></span>
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

</div>
