<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\VehicleController;
use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí definimos todas las rutas de tu API
|
*/


Route::apiResource('roles', RoleController::class);

Route::apiResource('users', UserController::class);

Route::apiResource('companies', CompanyController::class);

Route::apiResource('categories', CategoryController::class);

Route::apiResource('products', ProductController::class);

Route::apiResource('services', ServiceController::class);

Route::apiResource('orders', OrderController::class);

Route::apiResource('vehicles', VehicleController::class);

Route::apiResource('deliveries', DeliveryController::class);

Route::apiResource('carts', CartController::class);

