<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Students $model */
?>

<div class="row position-relative">
    <div class="col-12 f-14 d-flex align-items-center justify-content-between" style="padding: 10px; border-radius:10px;background:#fff;box-shadow:0px 0px 1px 0px gray; display: flex; align-items: center">
        <div class="d-flex align-items-center gap-2">
            <strong style="border-right:1px solid #777;padding-right:10px;margin-right:10px;">
                Students
            </strong>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15" style="display:block;">
                <path fill="#000000" fill-rule="evenodd" d="M7.08.222a.6.6 0 0 1 .84 0l6.75 6.64a.6.6 0 0 1-.84.856L13 6.902V12.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5V6.902l-.83.816a.6.6 0 1 1-.84-.856L7.08.222Zm.42 1.27L12 5.918V12h-2V8.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V12H3V5.918l4.5-4.426ZM7 12h2V9H7v3Z" clip-rule="evenodd"/>
            </svg>
            <span>- Admission Letter</span>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 text-center rounded-4 p-4 pt-0 bg-white mt-5" style="border:2px solid gray;">
        <h6 class="bg-gradient-gray text-white p-2" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">ADMISSION CONFIRMATION</h6>
        <h5><img src="<?= empty($student->photo) || !file_exists(Yii::getAlias('@webroot/' . $student->photo))
                ? Url::to('@web/assets/images/' . ($student->gender === 'Male' ? 'male.png' : 'female.png'))
                : Url::to('@web/' . $student->photo) ?>"
                 alt="Student photo"
                 width=100px class='img-circle rounded-circle mx-auto' height=100px></h5>
        <h5 class="m-dblue fs-3 fw-bolder m-2"><?= Html::encode($student->name) ?></h5>



        <table class="table table-striped text-start">
            <tbody>
            <tr><td>Registration/ID</td><td><b><?= Html::encode($student->registration_number) ?></b></td></tr>
            <tr><td>Class</td><td><b>    <?= Html::encode($student->class->name) ?></b></td></tr>
            <tr><td>Admission Date</td><td><b><?= Yii::$app->formatter->asDate($student->data_admission, 'php:d F, Y') ?></b></td></tr>
            <tr><td>Account Status</td><td><b class="text-success"><?= Html::encode(ucfirst($student->status)) ?> <i class="fa fa-check"></i></b></td></tr>

            <tr><td>Username</td><td><b>No Data Provided</b></td></tr>
            <tr><td>Password</td><td><b>No Data Provided</b></td></tr>
            </tbody>
        </table>
        <h3>
            <button class="btn btn-sm mt-4 p-2 bg-m-orange text-white rounded-4"
                    id='btn'
                    onclick='printDiv();'>
                <i class="fa-solid fa-print"></i> Print Admission Letter
            </button>
        </h3>
    </div>
    <div class="col-lg-4"></div>
    <div id="admission-letter" class="canvas_div_pdf">
            <div class="row d-none" id="area" style="width:100%">
                <div class="col-lg-12 col-md-12">
                    <div class="col-lg-12 col-md-12" style="background:#fff;font-size:10px;padding:10px;">
                        <div class="module-head p-b-0" style="text-align:center;background:#fff;">
                            <?= Html::img('@web/assets/icons/skooly-icon.png', ['alt' => 'My Application Logo', 'class' => 'logo mx-auto d-block']) ?>
                            <br>
                            <font style="font-size:20px;font-weight:bold;color:black;">eSkooly</font>
                            <br><b>" YOUR SCHOOL SOFTWARE "</b><br>
                            <i class="icon-phone"></i> +923460204447 |
                            <i class="icon-globe"></i> www.eskooly.com |
                            <i class="icon-envelope"></i> info@eskooly.com<br>
                            <font class="m-dblue" style="font-size:20px;font-weight:bold;">Admission Letter</font>
                            <hr class="hr">
                        </div>

                        <div class="module-body" style="color:#555;">
                            <div class="row-fluid p-5 pt-0 pb-2 bg-white border-light-subtle" >
                                <table style="width:100%;"><tr style="border:none;"><td>
                                        <img class="img-fluid rounded-circle mx-auto"
                                             src="<?= empty($student->photo) || !file_exists(Yii::getAlias('@webroot/' . $student->photo))
                                                 ? Url::to('@web/assets/images/' . ($student->gender === 'Male' ? 'male.png' : 'female.png'))
                                                 : Url::to('@web/' . $student->photo) ?>"
                                             alt="Student photo" width=130px height=130px>												</td>
                                        <td>
                                            <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                                <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                                <span class="view_sidebar_request">Registration No</span><br>
                                                <strong class="view_sidebar_response text-black"><?= Html::encode($student->registration_number) ?></strong>
                                            </div>
                                            <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                                <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                                <span class="view_sidebar_request">Name</span><br>
                                                <strong class="view_sidebar_response text-black"><?= Html::encode($student->name) ?></strong>
                                            </div>
                                            <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                                <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                                <span class="view_sidebar_request">Class</span><br>
                                                <strong class="view_sidebar_response text-black"> <?= Html::encode($student->class->name) ?></strong>
                                            </div>
                                            <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                                <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                                <span class="view_sidebar_request">Date Of Birth</span><br>
                                                <strong class="view_sidebar_response text-black"> <?= Yii::$app->formatter->asDate($student->date_of_birth, 'php:d F, Y') ?></strong>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                                <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                                <span class="view_sidebar_request">Gender</span><br>
                                                <strong class="view_sidebar_response text-black"> <?= Html::encode($student->gender) ?></strong>
                                            </div>
                                            <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                                <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                                <span class="view_sidebar_request">Date of Admission</span><br>
                                                <strong class="view_sidebar_response text-black"> <?= Html::encode($student->data_admission) ?></strong>
                                            </div>
                                            <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                                <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                                <span class="view_sidebar_request">Discount In Fee</span><br>
                                                <strong class="view_sidebar_response text-black"> <?= Html::encode($student->discount_fee) ?> %</strong>
                                            </div>
                                            <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                                <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                                <span class="view_sidebar_request">Status</span><br>
                                                <strong class="view_sidebar_response text-black"> <?= Html::encode($student->status) ?></strong>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                                <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                                <span class="view_sidebar_request">Level</span><br>
                                                <strong class="view_sidebar_response text-black"> <?= Html::encode($student->level) ?></strong>
                                            </div>
                                            <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                                <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                                <span class="view_sidebar_request">Mobile For Contact</span><br>
                                                <strong class="view_sidebar_response text-black"> <?= Html::encode($student->phone) ?></strong>
                                            </div>
                                            <div class="position-relative view_sidebar_line" style="line-height:15px;min-height:30px;">
                                                <img class="view_sidebar_line_image" src="<?= Yii::getAlias('@web') ?>/assets/icons/arrow-down.png">
                                                <span class="view_sidebar_request">Email</span><br>
                                                <strong class="view_sidebar_response text-black"> <?= Html::encode($student->email) ?></strong>
                                            </div>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <hr class="hr">
                            <div class="row-fluid p-20 p-t-5" style="background:white;">

                                <Strong class="f-14 m-gray">Rules And Regulations: </strong><br>
                                The school rules have been established in partnership with the community over a long period of time. They reflect the school community’s expectations in terms of acceptable standards of behaviour, dress and personal presentation in the widest sense. Students are expected to follow the school rules at all times when on the school grounds, representing the school, attending a school activity or when clearly associated with the school i.e. when wearing school uniform.

                                <br>Students have the responsibility:<br>
                                To attend school regularly
                                <br>To respect the right of others to learn
                                <br>To respect their peers and teachers regardless of ethnicity, religion or gender
                                <br>To respect the property and equipment of the school and others
                                <br>To carry out reasonable instructions to the best of their ability
                                <br>To conduct themselves in a courteous and appropriate manner in school and in public
                                <br>To keep the school environment and the local community free from litter
                                <br>To observe the uniform code of the school
                                <br>To read all school notices and bring them to their parents’/guardians’ attention

                            </div>


                        </div>

                        <div class="row footer" style="background:white;">
                            <div class="col-6">Signature of Authority<div style="display:inline-block; width:150px; padding:10px; border-bottom:1px solid #999;"></div></div>
                            <div class="col-6 text-right">Institute Stamp<div style="display:inline-block; width:150px; padding:10px; border-bottom:1px solid #999;"></div></div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<script>
    async function printDiv() {
        const { jsPDF } = window.jspdf;
        const element = document.getElementById('admission-letter');
        const hiddenArea = document.getElementById('area');
        const btn = document.getElementById('btn');

        // Temporarily show the hidden content
        hiddenArea.classList.remove('d-none');

        btn.disabled = true;
        btn.innerHTML = 'Generating PDF...';

        // Clone only the admission letter part into a temporary element
        const clonedElement = element.cloneNode(true);
        const tempContainer = document.createElement('div');
        tempContainer.style.padding = '40px';
        tempContainer.style.background = 'white';
        tempContainer.appendChild(clonedElement);
        document.body.appendChild(tempContainer);

        // Scroll to top to ensure full capture
        window.scrollTo(0, 0);

        // Capture only the letter area
        const canvas = await html2canvas(tempContainer, {
            scale: 2,
            useCORS: true,
            backgroundColor: '#ffffff'
        });

        const imgData = canvas.toDataURL('image/png');
        const pdf = new jsPDF('p', 'mm', 'a4');
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();

        const imgWidth = pageWidth - 20; // side margin
        const imgHeight = canvas.height * imgWidth / canvas.width;

        let position = 10;
        let heightLeft = imgHeight;

        pdf.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
        heightLeft -= pageHeight;

        while (heightLeft > 0) {
            position = heightLeft - imgHeight;
            pdf.addPage();
            pdf.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;
        }

        // Auto download PDF
        const filename = "Admission_Letter_<?= Html::encode($student->name) ?>.pdf";
        pdf.save(filename);

        hiddenArea.classList.add('d-none');
        // Clean up
        document.body.removeChild(tempContainer);
        btn.disabled = false;
        btn.innerHTML = '<i class="fa-solid fa-print"></i> Print Admission Letter';
    }
</script>
