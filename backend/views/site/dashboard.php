<?php

/** @var yii\web\View $this */
/** @var yii\web\View $totalStudents */
/** @var yii\web\View $studentsThisMonth */
/** @var yii\web\View $totalEmployees */
/** @var yii\web\View $employeesThisMonth */
/** @var yii\web\View $months */
/** @var yii\web\View $income */
/** @var yii\web\View $expenses */
/** @var yii\web\View $classStats*/
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- order-card start -->
                        <div class="col-md-6 col-xl-3">
                            <a href="<?= \yii\helpers\Url::to(['/students/index']) ?>">
                                <div class="card bg-m-dblue bg-white rounded-4 text-white">
                                    <div class="card-block ">
                                        <h6 class="mb-3">Total Students</h6>
                                        <h2 class="text-right h2 d-flex align-items-center justify-content-between">
                                            <i class="fa-regular fa-user"></i>
                                            <span><?= $totalStudents ?></span></h2>
                                        <p class="mb-0">
                                            This Month <span class="f-right"><?= $studentsThisMonth ?></span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <a href="<?= \yii\helpers\Url::to(['/employees/index']) ?>">
                                <div class="card bg-m-gray rounded-4 order-card text-white">
                                    <div class="card-block">
                                        <h6 class="mb-3">Total Employees</h6>
                                        <h2 class="text-right h2 d-flex align-items-center justify-content-between">
                                            <i class="fa-solid fa-briefcase"></i>
                                            <span><?= $totalEmployees?></span></h2>
                                        <p class="mb-0">This Month<span class="f-right"><?= $employeesThisMonth?></span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <a href="balance.php">
                                <div class="card bg-m-orange rounded-4 order-card text-white">
                                    <div class="card-block">
                                        <h6 class="mb-3">Revenue</h6>
                                        <h2 class="text-right h2 d-flex align-items-center justify-content-between"><span class="f-left" style="font-weight:300;vertical-align:top;">$</span><span>537,110</span></h2>
                                        <p class="mb-0">This Month<span class="f-right"><b>$</b> 0</span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <a href="balance.php">
                                <div class="card bg-m-blue1 rounded-4 order-card text-white">
                                    <div class="card-block">
                                        <h6 class="mb-3">Total Profit</h6>
                                        <h2 class="text-right h2 d-flex align-items-center justify-content-between"><span class="f-left" style="font-weight:300;vertical-align:top;">$</span><span>-14,062,870</span></h2>
                                        <p class="mb-0">This Month<span class="f-right"><b>$</b> 0</span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- order-card end -->

                        <!-- statustic and process start -->
                        <div class="col-lg-8 col-md-12">
                            <div class="m-main row mx-0">
                                <div class="m-container order-card">
                                    <?= Html::img('@web/assets/icons/admin-message.png', ['alt' => 'admin message image', 'class' => 'img-1']) ?>
                                    <h6 class="mb-1 m-orange text-">Welcome to Admin Dashboard</h6>
                                    <p style="color:#777;">Your Account is not Verified yet!
                                        <br> Please Verify your email address.
                                        <a href="sendVerificationLink.php" class="text-primary">Verify now!</a></p>
                                </div>
                            </div>
                            <div class="card rounded-4">
                                <div class="card-header">
                                    <h5 class="m-gray">Statistics</h5>
                                </div>
                                <div class="card-block">
                                    <canvas id="financeChart" style="width: 100%; height: 350px;"></canvas>
<!--                                    -->
                                </div>
                            </div>
                            <div class="card rounded-4">
                                <div class="card-header">
                                    <h5 class="m-gray">Statistics</h5>
                                </div>
                                <div class="card-block">
                                    <canvas id="classBarChart" style="width:100%; height:400px;"></canvas>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-orange">Today Absent Students</h5>
                                </div>
                                <div class="card-block">
                                    <p class="m-orange text-center"><i class="ti-face-sad"></i><br> Attendance Not Marked Yet !</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-blue1">Today Present Employees</h5>
                                </div>
                                <div class="card-block">
                                    <p class="m-orange text-center"><i class="ti-face-sad"></i><br> Attendance Not Marked Yet !</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-gray">New Admissions</h5>
                                </div>
                                <div class="card-block">
                                    <p class="m-orange text-center"><i class="ti-face-sad"></i><br>No New Admissions This Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="ms-main row m-r-10">
                                <a href="https://reviews.capterra.com/products/new/57850618-b167-4f92-a924-a9ea0052e5bc/fb64422b-bc09-4a28-8711-b559e0022db3?lang=en" class="w-100" target="_blank">
                                    <div class="ms-container position-relative w-100 order-card w-100 rounded-4" style="background:#d5e0ff;color:#2b1f6b;padding-top:10px;">
                                        <i class="fa-solid fa-star m-green" style="font-size:12px;"></i>
                                        <i class="fa-solid fa-star m-green" style="font-size:12px;"></i>
                                        <i class="fa-solid fa-star m-green" style="font-size:12px;"></i>
                                        <i class="fa-solid fa-star m-green" style="font-size:12px;"></i>
                                        <i class="fa-solid fa-star m-green" style="font-size:12px;"></i>
<!--                                        <i class=""></i>-->
                                        <i class="fa-solid fa-gift" style="position:absolute;right:12px;top:10px;font-size:70px;"></i>

                                        <h6 class="m-b-5" style="font-size:18px;">Review & earn</h6>
                                        <p style="color:#252525;font-size:12px;font-weight:300;line-height:14px;">Receive <strong><b style="color:#2b1f6b;font-weight:600;">$10</b> as a reward</strong> plus<br>Chance to <b style="color:#2b1f6b;font-weight:600;">win</b> a <strong>Desktop</strong> plan.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card rounded-4">
                                <div class="card-header">
                                    <h5>Estimated Fee This Month</h5>
                                </div>
                                <div class="card-block">
                                    <p class="text-center m-orange m-b-0"><i class="ti-target m-r-5"></i>Estimation</p>
                                    <span class="d-block m-orange f-24 f-w-600 text-center" id="estimated"><i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i><font style="font-size:12px;color:#Cacccd;"> Calculating..</font></span>
                                    <canvas id="feedback-chartm" height="100"></canvas>
                                    <div class="row justify-content-center m-t-15">
                                        <div class="col-auto b-r-default m-t-5 m-b-5">
                                            <h4 id="collection"><i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i><font style="font-size:12px;color:#Cacccd;"> Calculating..</font></h4>
                                            <p class="text-success m-b-0"><i class="ti-wallet m-r-5"></i>Collections</p>
                                        </div>
                                        <div class="col-auto m-t-5 m-b-5">
                                            <h4 id="remainings"><i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i><font style="font-size:12px;color:#Cacccd;"> Calculating..</font></h4>
                                            <p class="text-danger m-b-0"><i class="ti-hand-point-down m-r-5"></i>Remainings</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-main row">
                                <a href="smsSettings.php" class="w-100">
                                    <div class="position-relative ms-container order-card bg-m-dblue w-100 rounded-4">
                                        <?= Html::img('@web/assets/icons/freesms.png', ['alt' => 'admin message image', 'class' => '']) ?>
                                        <h6 class="m-b-5">Free SMS Gateway</h6>
                                        <p style="color:silver;font-size:12px;">Send Unlimited Free SMS<br>on Mobile Numbers.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card rounded-4">
                                <div class="card-block">
                                    <p style="line-height:5px;color:#777;">Today Present Students<b class="f-right m-blue1">0%</b></p>
                                    <div class="progress" style="height:5px;">

                                        <div class="progress-bar bg-m-blue1" role="progressbar" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100" style="width:0%;">

                                        </div>
                                    </div>
                                    <p style="margin-top:20px;line-height:5px;color:#777;">Today Present Employees<b class="f-right m-orange">0%</b></p>
                                    <div class="progress" style="height:5px;">

                                        <div class="progress-bar bg-m-orange" role="progressbar" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100" style="width:0%;">

                                        </div>
                                    </div>
                                    <p style="margin-top:20px;line-height:5px;color:#777;">This Month Fee Collection<b class="f-right m-blue1">0%</b></p>
                                    <div class="progress" style="height:5px;">

                                        <div class="progress-bar bg-m-blue1" role="progressbar" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100" style="width:0%;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-main row">
                                <a href="https://desktop.eskooly.com" class="w-100">
                                    <div class="ms-container position-relative order-card bg-m-orange rounded-4">
                                        <?= Html::img('@web/assets/icons/desktop.png', ['alt' => 'admin message image', 'class' => 'img-1']) ?>
                                        <h6 class="mb-1" style="line-height:12px;">Desktop Version</h6>
                                        <p style="color:#555;font-size:10px;margin-bottom:4px;line-height:10px;">*Download & install eSkooly<br>on your PC.</p>
                                        <a href="https://desktop.eskooly.com"><button class="btn btn-sm" style="background:#673de5;color:#fff;font-size:8px;line-height:8px;padding:6px;"><table><tr><td><i class="fa fa-windows" style="font-size:15px;"></i></td><td><strong>Download</strong><br><span style="font-size:6px;">For Windows</span></td></tr></table></button></a>
                                        <a href="https://desktop.eskooly.com">
                                            <button class="btn btn-sm" style="background:#333;color:#fff;font-size:8px;line-height:8px;margin-left:3px;padding:6px;"><table><tr><td><i class="fa fa-apple" style="font-size:15px;"></i></td><td><strong>Download</strong><br><span style="font-size:6px;">For MacOS </span></td></tr></table></button></a>
                                    </div>
                                </a>
                            </div>

                            <div class="card user-card m-round">


                                <div class="icalendar">
                                    <div class="icalendar__month">
                                        <div class="icalendar__prev" onclick="moveDate('prev')">
                                            <span>&#10094</span>
                                        </div>
                                        <div class="icalendar__current-date">
                                            <h2 id="icalendarMonth"></h2>
                                            <div>
                                                <div id="icalendarDateStr"></div>
                                            </div>

                                        </div>
                                        <div class="icalendar__next" onclick="moveDate('next')">
                                            <span>&#10095</span>
                                        </div>
                                    </div>
                                    <div class="icalendar__week-days">
                                        <div>Sun</div>
                                        <div>Mon</div>
                                        <div>Tue</div>
                                        <div>Wed</div>
                                        <div>Thu</div>
                                        <div>Fri</div>
                                        <div>Sat</div>
                                    </div>
                                    <div class="icalendar__days"></div>



                                </div>

                            </div>

                        </div>
                        <!-- statustic and process end -->
                        <!-- tabs card start -->

                        <!-- tabs card end -->



                        <!-- users visite and profile start -->
                        <div class="col-md-4">



                        </div>
                        <div class="col-md-8">

                        </div>
                        <!-- users visite and profile end -->

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('financeChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($months) ?>,
                datasets: [
                    {
                        label: 'Expenses',
                        data: <?= json_encode($expenses) ?>,
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.3)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                        tension: 0.4
                    },
                    {
                        label: 'Income',
                        data: <?= json_encode($income) ?>,
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.3)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('classBarChart').getContext('2d');

        // Pull labels & data from PHP classStats
        const classLabels = <?= json_encode(array_column($classStats, 'name')) ?>;
        const studentCounts = <?= json_encode(array_column($classStats, 'students')) ?>;

        // If no data, show placeholder
        if (!classLabels.length) {
            ctx.font = "16px Arial";
            ctx.fillText("No class data available", 20, 50);
            return;
        }

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: classLabels,
                datasets: [{
                    label: 'Students',
                    data: studentCounts,
                    backgroundColor: studentCounts.map(() => 'rgba(94,129,244,0.7)'),
                    borderColor: studentCounts.map(() => 'rgba(94,129,244,1)'),
                    borderWidth: 1,
                    borderRadius: 6,
                    barThickness: 22
                }]
            },
            options: {
                indexAxis: 'y', // horizontal bars
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(ctx) {
                                return ctx.raw + ' students';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        },
                        title: { display: true, text: 'Number of students' }
                    },
                    y: {
                        ticks: { color: '#333' },
                        grid: { display: false }
                    }
                }
            }
        });
    });
</script>