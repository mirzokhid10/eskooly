
<?php
use yii\helpers\Url;
use yii\helpers\StringHelper;

$currentController = Yii::$app->controller->id;
$currentAction = Yii::$app->controller->action->id;

// Helper: check if controller matches
function isActive($controller, $actions = []) {
    $currentController = Yii::$app->controller->id;
    $currentAction = Yii::$app->controller->action->id;
    if ($currentController !== $controller) return false;
    if (empty($actions)) return true;
    return in_array($currentAction, $actions);
}
?>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
             <a href="<?= Url::to(['/dashboard']) ?>"
                   class="nav-link flex items-center p-2 rounded-lg <?= $currentController === 'site' ? 'bg-blue-100 text-blue-600' : 'text-gray-700' ?>">
                    <i class="fa-regular fa-house me-3"></i>
                    Dashboard
                </a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">General</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>General Settings</span></a>

                <ul class="dropdown-menu" style="border: none;">
                    <li><a class="nav-link" href="<?= Url::to(['/institute-profile/update']) ?>">Institute Profile</a></li>
                    <li><a class="nav-link" href="<?= Url::to(['/fee-particulars/update']) ?>">Fee Particulars</a></li>
                    <li><a class="nav-link" href="<?= Url::to(['/fee-invoice/index']) ?>">Fee Invoices</a></li>
                </ul>
            </li>
            <li class="menu-header">Educational</li>
            <li><a class="nav-link" href="<?= Url::to(['/classes/index']) ?>"><i class="fa-solid fa-people-group"></i><span> Classes</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-book-open"></i> <span>Subjects</span></a>
                <ul class="dropdown-menu" style="border: none;">

                    <li><a class="nav-link" href="<?= Url::to(['/subjects/index']) ?>">Classes With Subjects</a></li>

                    <li><a class="nav-link" href="<?= Url::to(['/subjects/create']) ?>">Assign Subjects</a></li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-graduation-cap"></i> <span>Students</span></a>
                <ul class="dropdown-menu" style="border: none;">
                    <li><a class="nav-link" href="<?= Url::to(['/students/index']) ?>">All Students</a></li>
                    <li><a class="nav-link" href="<?= Url::to(['/students/create']) ?>">Add New A Student</a></li>
                    <li><a class="nav-link" href="<?= Url::to(['/students/basic-list']) ?>">Print Basic List</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-briefcase"></i><span>Employees</span></a>
                <ul class="dropdown-menu" style="border: none;">
                    <li><a class="nav-link" href="<?= Url::to(['/employees/index']) ?>">All Employees</a></li>
                    <li><a class="nav-link" href="<?= Url::to(['/employees/create']) ?>">Add New An Employee</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-money-bill-1"></i> <span>Accounts</span></a>
                <ul class="dropdown-menu" style="border: none;">
                    <li><a href="<?= Url::to(['/chart-of-account/index']) ?>">Chart Of Account</a></li>
                    <li><a href="<?= Url::to(['/transactions/add-income']) ?>">Add Income</a></li>
                    <li><a href="<?= Url::to(['/transactions/add-expense']) ?>">Add Expense</a></li>
                    <li><a href="<?= Url::to(['/transactions/index']) ?>">Transactions</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-money-check-dollar"></i><span>Student Payments</span></a>
                <ul class="dropdown-menu" style="border: none">
                    <li><a class="nav-link" href="<?= Url::to(['/student-payments/index']) ?>">Collect Fee</a></li>
                    <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                    <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                    <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                    <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                    <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                    <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                    <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                    <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                    <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                    <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                    <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                </ul>
            </li>
            <li class="menu-header">Pages</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                    <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                    <li><a href="auth-login.html">Login</a></li>
                    <li><a href="auth-register.html">Register</a></li>
                    <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="errors-503.html">503</a></li>
                    <li><a class="nav-link" href="errors-403.html">403</a></li>
                    <li><a class="nav-link" href="errors-404.html">404</a></li>
                    <li><a class="nav-link" href="errors-500.html">500</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                    <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                    <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                    <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                    <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                    <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                    <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
                <ul class="dropdown-menu">
                    <li><a href="utilities-contact.html">Contact</a></li>
                    <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                    <li><a href="utilities-subscribe.html">Subscribe</a></li>
                </ul>
            </li>            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>



