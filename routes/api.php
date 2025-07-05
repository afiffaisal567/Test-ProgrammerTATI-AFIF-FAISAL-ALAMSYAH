<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;

Route::apiResource('provinsi', ProvinsiController::class);
Route::post('provinsi/import/wilayah-id', [ProvinsiController::class, 'importFromWilayahId']);
