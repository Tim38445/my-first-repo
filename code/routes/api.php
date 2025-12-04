<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PurchasesController;

Route::get('/hello', [PurchasesController::class, 'hello']);
Route::apiResource('purchases', Api\PurchasesController::class);

Route::get('/purchases', [PurchasesController::class, 'index']);
Route::get('/purchases/{id}', [PurchasesController::class, 'show']);
Route::post('/purchases', [PurchasesController::class, 'store']);
Route::put('/purchases/{id}', [PurchasesController::class, 'update']);
Route::delete('/purchases/{id}', [PurchasesController::class, 'destroy']);
Route::get('/purchases/pastpurchases/{pastpurchases}', [PurchasesController::class, 'getByPastPurchases']);
Route::delete('/purchases/name/{name}', [PurchasesController::class, 'deleteByName']);
Route::delete('/purchases/pastpurchases/{pastpurchases}', [PurchasesController::class, 'deleteByPastPurchases']);

Route::get('/getByName', [PurchasesController::class, 'getByName'])->middleware('auth:sanctum');
