<?php

use App\Http\Controllers\JournalEntryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'msg' => 'testing'
    ]);
});

Route::prefix('journal')->group(function () {
    Route::post('/add', [JournalEntryController::class, 'store']);
});
