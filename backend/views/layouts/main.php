<?php
use yii\helpers\Html;
use backend\assets\BootsAsset;

BootsAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title><?= Html::encode($this->title ?? 'Dashboard — Stisla') ?></title>
  <?= Html::csrfMetaTags() ?>
  <?php $this->head() ?>
  <?= Html::cssFile('@web/assets/css/style.css') ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />



  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'UA-94034622-3');
  </script>
</head>

<body>
  <?php $this->beginBody() ?>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <?= $this->render('header')?>
      <?= $this->render('sidebar') ?>

      <!-- Main Content -->
      <div class="main-content" style="background: #F6F7FB">
        <section class="section">
          <?= $content ?>
        </section>

      </div>
    </div>
  </div>

  <?php
$flashes = Yii::$app->session->getAllFlashes();
if (!empty($flashes)): ?>
  <div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 1080;">
    <?php foreach ($flashes as $type => $message): ?>
    <?php
            // map Yii flash types to Bootstrap colors
            $bg = match ($type) {
                'error' => 'danger',
                'success' => 'success',
                'warning' => 'warning',
                'info' => 'info',
                default => 'secondary',
            };
            ?>
    <div class="toast align-items-center text-bg-<?= $bg ?> border-0 mb-2" role="alert" aria-live="assertive"
      aria-atomic="true" data-bs-delay="4000" data-bs-autohide="true">
      <div class="d-flex">
        <div class="toast-body fw-semibold">
          <?= $message ?>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
          aria-label="Close"></button>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <script>
  document.addEventListener('DOMContentLoaded', () => {
    const toastElements = document.querySelectorAll('.toast');
    toastElements.forEach(el => {
      const t = new bootstrap.Toast(el);
      t.show();
    });
  });
  </script>
  <?php endif; ?>


  <?php $this->endBody() ?>
  <!--<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
  </script>
  <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
  </script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.datatable').DataTable();
  });
  </script>
</body>

</html>
<?php $this->endPage() ?>