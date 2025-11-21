<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Employees $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employees-view">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row position-relative">
                            <div class="col-12 f-14 d-flex align-items-center justify-content-between" style="padding: 10px; border-radius:10px;background:#fff;box-shadow:0px 0px 1px 0px gray; display: flex; align-items: center">
                                <div class="d-flex align-items-center gap-2">
                                    <strong style="border-right:1px solid #777;padding-right:10px;margin-right:10px;">
                                        Employees
                                    </strong>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15" style="display:block;">
                                        <path fill="#000000" fill-rule="evenodd" d="M7.08.222a.6.6 0 0 1 .84 0l6.75 6.64a.6.6 0 0 1-.84.856L13 6.902V12.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5V6.902l-.83.816a.6.6 0 1 1-.84-.856L7.08.222Zm.42 1.27L12 5.918V12h-2V8.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V12H3V5.918l4.5-4.426ZM7 12h2V9H7v3Z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>- Employee Report </span>
                                </div>
                            </div>
                        </div>
                        <div class="row rounded-4 mt-4 mt-3">
                            <div class="col-lg-3 col-md-12 text-center rounded-4 mb-4 bg-white" style="box-shadow: 0 0 0 1px gray;">
                                <div class="pt-3">
                                    <img class="img-fluid rounded-circle mx-auto"
                                         src="<?= empty($model->photo) || !file_exists(Yii::getAlias('@webroot/' . $model->photo))
                                             ? Url::to('@web/assets/images/' . ($model->gender === 'Male' ? 'male.png' : 'female.png'))
                                             : Url::to('@web/' . $model->photo) ?>"
                                         alt="Student photo"
                                         style="width:140px; height:140px;border:6px solid #f6f7fb;box-shadow:0px 0px 3px 8px #f6f7fb;padding:1px;">
                                </div>
                                <div class="pt-3">
                                    <h4 style="line-height:25px;" class="gradient-blue m-0 f-24"><?= Html::encode($model->name) ?></h4>
                                </div>
                                <div style="background:#f6f7fb;" class="rounded-4 p-3 text-left mt-2">
                                    <div class="position-relative " style="line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Registration No</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->national_id) ?></strong>
                                    </div>
                                    <div class="position-relative" style="position:relative;line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Full Name</span><br>
                                        <strong class="view_sidebar_response"> <?= Html::encode($model->name) ?></strong>
                                    </div>
                                    <div class="position-relative" style="position:relative;line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Registration No</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->role) ?></strong>
                                    </div>
                                    <div class="position-relative" style="position:relative;line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Monthly Salary</span><br>
                                        <strong class="view_sidebar_response"><span class="m-gray" id="symbol">$</span> <?= Html::encode($model->salary) ?></strong>
                                    </div>
                                    <div class="position-relative" style="position:relative;line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request">Mobile</span><br>
                                        <strong class="view_sidebar_response"> <?= Html::encode($model->mobile) ?></strong>
                                    </div>
                                </div>
                                <div style="padding:10px;" class="text-left m-gray p-3">
                                    <div class="position-relative" style="line-height:15px;min-height:30px;" >
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Email Address</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->email) ?></strong>
                                    </div>
                                    <div class="position-relative" style="line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Home Address</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->home_address) ?></strong>
                                    </div>
                                </div>
                                <div style="background:#f6f7fb;" class="rounded-4 p-3 text-left">
                                    <div class="position-relative" style="line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Data Joined:</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->date_of_joining) ?></strong>
                                    </div>
                                    <div class="position-relative" style="line-height:15px;min-height:30px;">
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Education</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->education) ?></strong>
                                    </div>
                                </div>
                                <div class="p-3 text-left m-gray">
                                    <div class="position-relative" style="line-height:15px;min-height:30px;" >
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Gender</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->gender) ?></strong>
                                    </div>
                                    <div class="position-relative" style="line-height:15px;min-height:30px;" >
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Religion</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->religion) ?></strong>
                                    </div>
                                    <div class="position-relative" style="line-height:15px;min-height:30px;" >
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Blood Group</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->blood_group) ?></strong>
                                    </div>
                                    <div class="position-relative" style="line-height:15px;min-height:30px;" >
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Date of Birth</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->date_of_birth) ?></strong>
                                    </div>
                                    <div class="position-relative" style="line-height:15px;min-height:30px;" >
                                        <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                        <span class="view_sidebar_request" style="border-bottom:1.5px solid #999;">Experience</span><br>
                                        <strong class="view_sidebar_response"><?= Html::encode($model->experience) ?></strong>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-9" >
                                <div class="row p-3" >
                                    <div class="col-lg-12" >
                                        <h6 class="w-100">
                                            <div class="bg-gradient-blue text-white view_middle_block_title_order">1</div>
                                            <strong class="gradient-blue view_middle_block_title">Attendance Report </strong>
                                        </h6>
                                        <div class="row rounded-4 mb-4 bg-white p-2 border-light-subtle ms-2 bg-white" style="box-shadow: 0 0 0 1px gray;">
                                            <div class="col-5 p-0 text-white ">
                                                <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                </div>
                                                <canvas id="myPieChart" class="mx-auto d-block" style="height: 173px; width: 173px;"></canvas>
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
                                                <button class="btn btn-sm view_middle_block_button" style="border:1px solid #999;border-radius:15px;width:100%;text-align:center;padding:3px;font-size:10px;position:relative;padding-top:5px;background:#FFFFF7;">
                                                    <font class="m-gray">NOT MARKED</font>
                                                    <span class="m-gray"><span class="bg-m-gray badge" style="padding:3px;"></span> Yesterday</span>
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
                                                        <div class="bg-m-blue1 r" style="border-radius:6px;">
                                                            <div class="text-white" style="padding:8px;padding-left:10px;padding-right:10px;">
                                                                <h6 class="fs-12 m-0">PRESENTS </h6>
                                                                <h3 class="fs-16 m-0" style="line-height:20px;">
                                                                    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                                                                    <lord-icon
                                                                            src="https://cdn.lordicon.com/zmkotitn.json"
                                                                            trigger="loop"
                                                                            delay="2000"
                                                                            colors="primary:#ffffff"
                                                                            style="width:20px;height:20px;display:inline-block;">
                                                                    </lord-icon>
                                                                    <span class="d-inline-block" style="float:right;">1</span></h3>
                                                                <p class="m-0" style="font-size:9px;">This Month<span class="f-right">0</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4" style="padding:4px;">
                                                        <div class="bg-m-gray" style="border-radius:6px;">
                                                            <div class="text-white" style="padding:8px;padding-left:10px;padding-right:10px;">
                                                                <h6 class="fs-12" style="margin-bottom:0px;">LEAVES</h6>
                                                                <h3 class="fs-16 m-0" style="line-height:20px;">
                                                                    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                                                                    <lord-icon
                                                                            src="https://cdn.lordicon.com/zmkotitn.json"
                                                                            trigger="loop"
                                                                            delay="2100"
                                                                            colors="primary:#ffffff"
                                                                            style="width:20px;height:20px; display: inline-block;">
                                                                    </lord-icon>
                                                                    <span class="d-inline-block" style="float:right;">1</span></h3>
                                                                <p class="m-0" style="font-size:9px;">This Month<span class="f-right">0</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4" style="padding:4px;">
                                                        <div class="bg-m-orange" style="border-radius:6px;">
                                                            <div class="text-white" style="padding:8px;padding-left:10px;padding-right:10px;">
                                                                <h6 class="fs-12" style="margin-bottom:0px;">ABSENTS</h6>
                                                                <h3 class="fs-16 m-0" style="line-height:20px;">
                                                                    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                                                                    <lord-icon
                                                                            src="https://cdn.lordicon.com/zmkotitn.json"
                                                                            trigger="loop"
                                                                            delay="2200"
                                                                            colors="primary:#ffffff"
                                                                            style="width:20px;height:20px;display:inline-block;">
                                                                    </lord-icon>
                                                                    <span class="d-inline-block" style="float:right;">1</span></h3>
                                                                <p class="m-0" style="font-size:9px;">This Month<span class="f-right">0</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4" >
                                        <h6 class="w-100">
                                            <div class="bg-gradient-blue text-white rounded-4 d-inline-block" style="width:20px;height:20px;padding-left:5px;">2</div>
                                            <strong class="gradient-blue f-16">Salary Report </strong> <span style="font-size:12px;" class="f-right"></span></h6>
                                        <div class="row p-4 pt-4 pb-4 bg-white border-4" style="">
                                            <div class="col-6" >
                                                <button class="btn btn-sm m-l-10 f-right" style="border:1px solid #999;border-radius:15px;width:100%;text-align:center;padding:3px;font-size:10px;position:relative;padding-top:6px;background:#FFFFF7;">
                                                    <font style="font-size:10px;font-weight:bold;" class="m-blue1"><i class="ti-wallet"></i> <span id="symbol">$</span> 9,000,000</font>
                                                    <span class="m-gray" style="position:absolute;top:-7px;left:5px;background:#fff;font-size:9px;padding:none;padding-left:4px; padding-right:4px;border-radius:10px;line-height:12px;border:1px solid #999;"><span class="bg-m-blue1 badge" style="padding:3px;"></span> Current Salary</span>
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-sm m-l-10 f-right" style="border:1px solid #999;border-radius:15px;width:100%;text-align:center;padding:3px;font-size:10px;position:relative;padding-top:6px;background:#FFFFF7;">
                                                    <font style="font-size:10px;font-weight:bold;" class="m-orange">SALARY NOT RECIEVED</font>
                                                    <span class="m-gray" style="position:absolute;top:-7px;left:5px;background:#fff;font-size:9px;padding:none;padding-left:4px; padding-right:4px;border-radius:10px;line-height:12px;border:1px solid #999;"><span class="bg-m-orange badge" style="padding:3px;"></span> This Month</span>
                                                </button>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-3 p-0"><hr></div>
                                                    <div class="col-6 text-center" style="padding-top:4px;">
                                                        <span class="m-gray" style="font-size: 12px;"><span class="bg-m-gray badge" style="padding:3px;"></span> Latest salary record <span class="bg-m-gray badge" style="padding:3px;"></span></span>
                                                    </div>
                                                    <div class="col-3 p-0"><hr></div>
                                                </div>
                                                <div class="row p-10" style="border-bottom:1px solid #999;">
                                                    <div class="col-6">
                                                        <strong class="m-blue1">January, 1970</strong><br>
                                                        <span class="m-gray" style="font-size: 12px;">05/09/2025</span>
                                                    </div>
                                                    <div class="col-6 text-right" style="line-height:8px;">
                                                        <strong class="m-blue1 text-center d-inline" style="font-size: 12px;"><i class="fa-solid fa-plus" style="font-size:8px;"></i> <span id="symbol">$</span>0</strong>
                                                        <strong class="m-orange text-center ml-3 mr-4 d-inline" style="font-size: 12px;"><i class="fa-solid fa-minus" style="font-size:8px;"></i> <span id="symbol">$</span>0</strong>
                                                        <button class="btn btn-sm bg-gradient-green text-white rounded-4 px-4 py-2" >PAID <strong><span id="symbol">$</span> 9,000,000</strong> <i class="fa fa-check"></i> </button>
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
