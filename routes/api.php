<?php


use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\UsersController;
use \App\Http\Controllers\Api\CategoryProductController;
use \App\Http\Controllers\Api\ProductsController;
use \App\Http\Controllers\Api\CropFieldsController;
use \App\Http\Controllers\Api\CerealsController;
use \App\Http\Controllers\Api\CropFieldSeasonController;


Route::resources([
    'users'                                       => UsersController::class,
    //'categories'                                  => CategoryProductController::class, fixme nn tem o por que listar todas as categorias eu acho
    'products'                                    => ProductsController::class,
    'crop_fields'                                 => CropFieldsController::class,
    'cereals'                                     => CerealsController::class,
    'crop_fields.crop_field_season'               => CropFieldSeasonController::class,
    'crop_fields.season_crop_field.used_products' => UsersController::class
]);
