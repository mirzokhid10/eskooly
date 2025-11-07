<?php

use common\models\Students;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\Search\StudentsClass $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\web\View $this */
/** @var common\models\Classes $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">


    <div class="classes-index" style="background-color: #F6F7FB">

        <div class="row position-relative">
            <div class="col-12 f-14 d-flex align-items-center justify-content-between" style="padding: 10px; border-radius:10px;background:#fff;box-shadow:0px 0px 1px 0px gray; display: flex; align-items: center">
                <div class="d-flex align-items-center gap-2">
                    <strong style="border-right:1px solid #777;padding-right:10px;margin-right:10px;">
                        Students
                    </strong>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15" style="display:block;">
                        <path fill="#000000" fill-rule="evenodd" d="M7.08.222a.6.6 0 0 1 .84 0l6.75 6.64a.6.6 0 0 1-.84.856L13 6.902V12.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5V6.902l-.83.816a.6.6 0 1 1-.84-.856L7.08.222Zm.42 1.27L12 5.918V12h-2V8.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V12H3V5.918l4.5-4.426ZM7 12h2V9H7v3Z" clip-rule="evenodd"/>
                    </svg>
                    <span>- All Students</span>
                </div>
                <div style="float:right;">
                     <button class="links btn btn-primary" type="button" title="Show Search Options" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="padding: 0 20px">
                        <i class="fa-solid fa-magnifying-glass"></i> Search
                    </button>
                    <a href=""></a>
                </div>
            </div>

        </div>

        <div class="row mt-3 ps-1 ">
            <?php foreach ($dataProvider->models as $student): ?>
                <div class="rounded-4" style="float:left;text-align:center;margin:10px;width:155px;line-height:15px;background:#fff;padding:15px;box-shadow:0px 0px 1px 0px gray;">
                    <img class="img-fluid rounded-circle mx-auto"
                         src="<?= empty($student->photo) || !file_exists(Yii::getAlias('@webroot/' . $student->photo))
                             ? Url::to('@web/assets/images/' . ($student->gender === 'Male' ? 'male.png' : 'female.png'))
                             : Url::to('@web/' . $student->photo) ?>"
                         alt="Student photo"
                         style="width:80px;height:80px;object-fit:cover;">

                    <span style="font-size:11px;color:#333;"><?= Html::encode($student->name) ?></span>
                    <br>
                    <b style="font-size:11px;color:#555;">UZ <?= Html::encode($student->name[0]) ?><?= Html::encode($student->registration_number) ?></b>
                    <div class="d-flex align-items-center justify-content-center gap-1 mt-2">
                        <a href="<?= Url::to(['students/view', 'id' => $student->id]) ?>" class="btn btn-sm rounded-circle bg-m-gray text-white d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" data-toggle="tooltip" type="submit" title="view"><i class="fa-solid fa-eye"></i></a>
                        <a href="<?= Url::to(['students/update', 'id' => $student->id]) ?>" class="btn btn-sm rounded-circle bg-m-blue1 text-white d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" data-toggle="tooltip" type="submit" title="edit"><i class="fa-solid fa-pencil"></i></a>
                        <a href="<?= Url::to(['students/admission-letter', 'id' => $student->id]) ?>" class="btn btn-sm rounded-circle bg-m-blue1 text-white d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" data-toggle="tooltip" type="submit" title="Students Admission Letter"><i class="fa-regular fa-file"></i></a>
                        <a href="" class="btn btn-sm rounded-circle bg-m-orange text-white d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" data-toggle="tooltip" type="submit" onclick="return confirm('Are You Sure You Want To Delete Student Record ?')" name="sdelete" title="delete"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>

            <?php endforeach; ?>


            <div class="col-md-6 col-xl-1">
                <a href="<?= yii\helpers\Url::to(['/students/create']) ?>">
                    <div class="card order-card rounded-5" style="border:2px dotted #3144de;">
                        <div class="card-block d-flex align-items-center justify-content-center py-5" style="color: #3144de;">
                            <h6 class="mb-1"></h6>
                            <h4 class="text-center f-14 d-inline-block align-items-center align-content-center" style="font-weight:500; ">
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


</div>
