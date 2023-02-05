<?php

use Illuminate\Support\Facades\Route;
use Msramdan\Generator\Http\Controllers\GeneratorController;
use Msramdan\Generator\Http\Middleware\GeneratorOnlyWorkOnLocal;

Route::middleware(['web'])->group(function () {
    Route::middleware(GeneratorOnlyWorkOnLocal::class)->group(function () {
        Route::get('/generators/get-sidebar-menus/{index}', [GeneratorController::class, 'getSidebarMenus'])->name('generators.get-sidebar-menus');

        Route::resource('generators', GeneratorController::class)->only('create', 'store');
    });
});
