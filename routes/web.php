<?php

use Laraveldaily\LaravelPermissionEditor\Http\Controllers\RoleController;
use Laraveldaily\LaravelPermissionEditor\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
