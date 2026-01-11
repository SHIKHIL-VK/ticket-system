<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\ReplyController;
use App\Http\Controllers\Api\Admin\AdminTicketController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/tickets', [TicketController::class, 'index']);
    Route::post('/tickets', [TicketController::class, 'store']);
    Route::put('/tickets/{ticket}', [TicketController::class, 'update']);
    Route::patch('/tickets/{ticket}/close', [TicketController::class, 'close']);

    Route::post('/tickets/{ticket}/replies', [ReplyController::class, 'store']);

    Route::prefix('admin')
    ->middleware('is.admin')
    ->group(function () {
        Route::get('/tickets', [AdminTicketController::class, 'index']);
        Route::patch('/tickets/{ticket}/status', [AdminTicketController::class, 'updateStatus']);
    });
});
