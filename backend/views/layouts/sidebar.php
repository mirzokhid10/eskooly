<?php
use yii\helpers\Url;
?>

<aside id="sidebar" class="fixed z-30 left-0 top-16 shadow-2xl h-full" style="width: var(--sidebar-width);">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-white h-full" style="width: var(--sidebar-width);">
        <!-- Header/Logo area of the original sidebar (Adjusted for fixed header) -->
        <div class="flex items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <!-- Note: SVG icons were replaced with simple Lucide icons for compatibility and simplicity -->
            <span class="fs-4 font-semibold text-gray-800">Menu</span>
        </div>
        <hr class="border-gray-300">
        <!-- Navigation Links -->
        <ul class="nav nav-pills flex-column mb-auto space-y-1">
            <li class="nav-item rounded-lg">
                <a href="#" class="nav-link active rounded-lg flex items-center p-2" aria-current="page">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0v-6a1 1 0 011-1h2a1 1 0 011 1v6m-4 0h4"></path></svg>
                    Home
                </a>
            </li>
            <li class="rounded-lg hover:bg-gray-100">
                <a href="<?= Url::to(['/classes/index']) ?>" class="nav-link link-dark flex items-center p-2 rounded-lg gap-3" style="color: #5e81f4">
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="#000000" d="M51.7 1.8h-4.9c-4.2 0-7.6 3.4-7.6 7.6V48q0 .6.3 1.2l7 11.6c.6 1 1.6 1.6 2.8 1.6s2.2-.6 2.8-1.6l7-11.6q.3-.6.3-1.2V9.4c-.1-4.2-3.5-7.6-7.7-7.6m-4.9 4.4h4.9c1.7 0 3.1 1.4 3.1 3.1V12H43.7V9.4c0-1.7 1.4-3.2 3.1-3.2m2.5 50.3l-5.6-9.2V16.6h11.1v30.7zM23.6
                    1.9H10.9c-3.4 0-6.2 2.8-6.2 6.2v47.7c0 3.4 2.8 6.2 6.2 6.2h12.7c3.4 0 6.2-2.8 6.2-6.2V8.1c.1-3.4-2.7-6.2-6.2-6.2m1.8 54c0 1-.8 1.8-1.8 1.8H10.9c-1 0-1.8-.8-1.8-1.8v-3.5h7c1.2 0 2.2-1 2.2-2.2s-1-2.2-2.2-2.2h-7v-5h2c1.2 0 2.2-1 2.2-2.2s-1-2.2-2.2-2.2h-2v-4.9h7c1.2 0 2.2-1 2.2-2.2s-1-2.2-2.2-2.2h-7v-4.9h2c1.2 0 2.2-1 2.2-2.2s-1-2.2-2.2-2.2h-2v-4.9h7c1.2 0 2.2-1 2.2-2.2s-1-2.2-2.2-2.2h-7V8.1c0-1 .8-1.8 1.8-1.8h12.7c1 0 1.8.8 1.8 1.8z"/></svg>
                    Classes
                </a>
            </li>
            <li class="rounded-lg hover:bg-gray-100">
                <a href="<?= Url::to(['/students/index']) ?>" class="nav-link link-dark flex items-center p-2 rounded-lg gap-3" style="color: #5e81f4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><path fill="#000000" d="m226.53 56.41l-96-32a8 8
                    0 0 0-5.06 0l-96 32A8 8 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.59 11.19a64 64 0 0 0 20.65 88.05c-18 7.06-33.56 19.83-44.94 37.29a8 8 0
                    1 0 13.4 8.74C77.77 197.25 101.57 184 128 184s50.23 13.25 65.3 36.37a8 8 0 0 0 13.4-8.74c-11.38-17.46-27-30.23-44.94-37.29a64 64 0 0 0
                    20.65-88l44.12-14.7a8 8 0 0 0 0-15.18ZM176 120a48 48 0 1 1-86.65-28.45l36.12 12a8 8 0 0 0 5.06 0l36.12-12A47.89 47.89 0 0 1 176 120Zm-48-32.43L57.3
                    64L128 40.43L198.7 64Z"/></svg>
                    Students
                </a>
            </li>
            <li class="rounded-lg hover:bg-gray-100">
                <a href="#" class="nav-link link-dark flex items-center p-2 rounded-lg">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    Products
                </a>
            </li>
            <li class="rounded-lg hover:bg-gray-100">
                <a href="#" class="nav-link link-dark flex items-center p-2 rounded-lg">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M7 15c-3.21 0-5.783-2.316-5-5.5 1.5-2 4-2 4 0"></path></svg>
                    Customers
                </a>
            </li>
        </ul>
    </div>
</aside>