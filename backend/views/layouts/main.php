<!DOCTYPE html>
<html lang="en">
<?php
use yii\helpers\Html;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggleable Sidebar Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?= Html::cssFile('@web/assets/css/style.css') ?>
</head>

<body class="sidebar-open bg-gray-50">

<?= $this->render('header') ?>

<!-- MAIN CONTAINER -->
<div class="flex-grow">
    <?= $this->render('sidebar') ?>
    <div id="main-content" class="p-6 shadow-inner" style="background-color: #F6F7FB">
        <?= $content ?>
    </div>
</div>

<!-- ✅ JS FILES (put BEFORE $this->endBody()) -->
<?= Html::jsFile('@web/assets/js/sidebar.js') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!--Charts JS-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<?php
$flashes = Yii::$app->session->getAllFlashes();
if (!empty($flashes)): ?>
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
            <?php foreach ($flashes as $type => $message): ?>
                <div class="toast align-items-center text-bg-<?= $type === 'error' ? 'danger' : ($type === 'warning' ? 'warning' : 'success') ?> border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?= $message ?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastElList = [].slice.call(document.querySelectorAll('.toast'))
            toastElList.map(function(toastEl) {
                const toast = new bootstrap.Toast(toastEl, { delay: 4000 })
                toast.show()
            })
        })
    </script>
<?php endif; ?>
<?php
    \yii\web\YiiAsset::register($this);
    \yii\bootstrap5\BootstrapAsset::register($this);
    \yii\bootstrap5\BootstrapPluginAsset::register($this);
?>

</body>
</html>
