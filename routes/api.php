<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BodyPartController;
use App\Http\Controllers\Api\ExercisesController;
use App\Http\Controllers\Api\InstructionsController;
use App\Http\Controllers\Api\SecondaryMusclesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('exercises', [ExercisesController::class, 'index']);
Route::get('bodyparts', [BodyPartController::class, 'index']);
Route::get('instructions', [InstructionsController::class, 'index']);
Route::get('muscles', [SecondaryMusclesController::class, 'index']);

Route::post('exercises', [ExercisesController::class, 'store']);
Route::post('bodyparts', [BodyPartController::class, 'store']);
Route::post("upload", [UploadController::class, 'upload']);
Route::post('instructions', [InstructionsController::class, 'store']);
Route::post('muscles', [SecondaryMusclesController::class, 'store']);
