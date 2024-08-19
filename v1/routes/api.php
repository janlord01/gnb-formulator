<?php

use App\Http\Controllers\FormulaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/')->group(function () {
    Route::resource('formula', FormulaController::class, [
        'names' => [
            'index' => 'formula.index',
            'store' => 'formula.store',
            'update' => 'formula.update',
            'destroy' => 'formula.destroy',
            'edit' => 'formula.edit',
        ]
    ]);
});
