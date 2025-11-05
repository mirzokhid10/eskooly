
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

<aside id="sidebar" class="fixed z-30 left-0 top-16 shadow-2xl h-full" style="width: var(--sidebar-width);">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-white h-full" style="width: var(--sidebar-width);">
        <div class="flex items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4 font-semibold text-gray-800">Menu</span>
        </div>
        <hr class="border-gray-300">

        <ul class="nav nav-pills flex-column mb-auto space-y-1">

            <!-- Dashboard -->
            <li class="nav-item rounded-lg hover:bg-gray-100">
                <a href="<?= Url::to(['/']) ?>"
                   class="nav-link flex items-center p-2 rounded-lg <?= $currentController === 'site' ? 'bg-blue-100 text-blue-600' : 'text-gray-700' ?>">
                    <i class="fa-regular fa-house me-3"></i>
                    Dashboard
                </a>
            </li>

            <?php
            $isGeneralActive = in_array($currentController, ['general', 'institute-profile', 'fee-particulars']);
            ?>


            <li class="rounded-lg hover:bg-gray-100">
                <button
                        class="nav-link w-full flex justify-between items-center p-2 rounded-lg transition-all duration-200 <?= $isGeneralActive ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-blue-100' ?>"
                        onclick="toggleDropdown('generalDropdown')">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-gear"></i>
                        <span>General Settings</span>
                    </div>
                    <svg id="generalDropdownArrow" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform duration-300 <?= $isGeneralActive ? 'rotate-180' : '' ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <ul id="generalDropdown"
                    class="flex-col pl-8 mt-1 space-y-1 overflow-hidden transition-all duration-300 ease-in-out <?= $isGeneralActive ? '' : 'hidden' ?>">
                    <li>
                        <a href="<?= Url::to(['/institute-profile/update']) ?>"
                           class="block p-2 rounded-md <?= isActive('institute-profile', ['update']) ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50' ?>">
                            Institute Profile
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/fee-particulars/update']) ?>"
                           class="block p-2 rounded-md <?= isActive('fee-particulars', ['update']) ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50' ?>">
                            Fees Particulars
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Classes -->
            <li class="rounded-lg hover:bg-gray-100">
                <a href="<?= Url::to(['/classes/index']) ?>"
                   class="nav-link flex items-center p-2 rounded-lg gap-3 <?= $currentController === 'classes' ? 'bg-blue-100 text-blue-600' : 'text-gray-700' ?>">
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="currentColor" d="M51.7 1.8h-4.9c-4.2 0-7.6 3.4-7.6 7.6V48q0 .6.3 1.2l7 11.6c.6 1 1.6 1.6 2.8 1.6s2.2-.6 2.8-1.6l7-11.6q.3-.6.3-1.2V9.4c-.1-4.2-3.5-7.6-7.7-7.6z"/></svg>
                    Classes
                </a>
            </li>

            <!-- Students (Dropdown) -->
            <?php
            $isStudentsActive = $currentController === 'students';
            ?>
            <li class="rounded-lg hover:bg-gray-100">
                <button
                        class="nav-link w-full flex justify-between items-center p-2 rounded-lg transition-all duration-200 <?= $isStudentsActive ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-blue-100' ?>"
                        onclick="toggleDropdown('studentsDropdown')">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.894.553l7 14A1 1 0 0117 19H3a1 1 0 01-.894-1.447l7-14A1 1 0 0110 3z" clip-rule="evenodd" />
                        </svg>
                        <span>Students</span>
                    </div>
                    <svg id="studentsDropdownArrow" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform duration-300 <?= $isStudentsActive ? 'rotate-180' : '' ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <ul id="studentsDropdown"
                    class="flex-col pl-8 mt-1 space-y-1 overflow-hidden transition-all duration-300 ease-in-out <?= $isStudentsActive ? '' : 'hidden' ?>">
                    <li>
                        <a href="<?= Url::to(['/students/index']) ?>"
                           class="block p-2 rounded-md <?= isActive('students', ['index']) ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50' ?>">
                            All Students
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/students/create']) ?>"
                           class="block p-2 rounded-md <?= isActive('students', ['create']) ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50' ?>">
                            Add Student
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/students/reports']) ?>"
                           class="block p-2 rounded-md <?= isActive('students', ['reports']) ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50' ?>">
                            Reports
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Customers -->
            <li class="rounded-lg hover:bg-gray-100">
                <a href="#" class="nav-link link-dark flex items-center p-2 rounded-lg text-gray-700 hover:bg-blue-100 transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M7 15c-3.21 0-5.783-2.316-5-5.5 1.5-2 4-2 4 0"></path></svg>
                    Customers
                </a>
            </li>
        </ul>
    </div>
</aside>

<script>

    function toggleDropdown(id) {
        const allDropdowns = document.querySelectorAll('ul[id$="Dropdown"]');
        const allArrows = document.querySelectorAll('svg[id$="Arrow"]');
        const clickedDropdown = document.getElementById(id);
        const clickedArrow = document.getElementById(id + 'Arrow');

        allDropdowns.forEach(dropdown => {
            if (dropdown.id !== id) {
                dropdown.classList.add('hidden');
                dropdown.style.maxHeight = null;
            }
        });

        allArrows.forEach(arrow => {
            if (arrow.id !== id + 'Arrow') {
                arrow.style.transform = 'rotate(0deg)';
            }
        });

        clickedDropdown.classList.toggle('hidden');
        if (clickedDropdown.classList.contains('hidden')) {
            clickedDropdown.style.maxHeight = null;
            clickedArrow.style.transform = 'rotate(0deg)';
        } else {
            clickedDropdown.style.maxHeight = clickedDropdown.scrollHeight + "px";
            clickedArrow.style.transform = 'rotate(180deg)';
        }
    }

</script>

