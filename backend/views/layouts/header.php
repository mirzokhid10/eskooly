<?php
/**
 * Header view for the layout.
 * Requires the Yii Html helper for asset generation.
 * @var \yii\web\View $this
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>

<header class="relative fixed top-0 left-0 right-0 h-16 bg-white shadow-lg flex items-center justify-between px-4 z-40">
    <!-- Burger Button and Logo/Title -->
    <div class="flex items-center space-x-4">
        <!-- Toggle Button -->
        <button id="sidebar-toggle" class="p-2 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <svg id="burger-icon" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <!-- Hamburger icon (when open) -->
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Logo/Title -->
        <div class="hidden sm:block">
            <a href="<?php Url::to(['/']) ?>">
                <?= Html::img('@web/assets/icons/logo1.png', ['alt' => 'My Application Logo', 'class' => 'logo']) ?>
            </a>
        </div>
    </div>

    <!-- Search Form -->
    <form class="hidden sm:block w-full max-w-lg mx-8">
        <label for="search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="search" id="search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-xl bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Search orders, customers, or reports..." required>
        </div>
    </form>

    <!-- Profile Placeholder -->
    <div class="flex items-center space-x-2">
        <img src="https://placehold.co/32x32/1a56db/ffffff?text=U" alt="Profile" class="rounded-full w-8 h-8 object-cover">
    </div>
</header>