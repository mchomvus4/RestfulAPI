<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
///Students Class Routes
Route::get('/class',[StudentClassController::class, 'Index']);
Route::post('/class/store',[StudentClassController::class, 'Store']);
Route::get('/class/edit/{id}',[StudentClassController::class, 'Edit']);
Route::post('/class/update/{id}',[StudentClassController::class, 'Update']);
Route::get('/class/delete/{id}',[StudentClassController::class, 'Delete']);


///Subject  Routes
Route::get('/subject',[SubjectController::class, 'Index']);
Route::post('/subject/store',[SubjectController::class, 'StoreSubject']);
Route::get('/subject/edit/{id}',[SubjectController::class, 'EditSubject']);
Route::post('/subject/update/{id}',[SubjectController::class, 'UpdateSubject']);
Route::get('/subject/delete/{id}',[SubjectController::class, 'DeleteSubject']);

///Section  Routes
Route::get('/section',[SectionController::class, 'Index']);
Route::post('/section/store',[SectionController::class, 'StoreSection']);
Route::get('/section/edit/{id}',[SectionController::class, 'EditSection']);
Route::post('/section/update/{id}',[SectionController::class, 'UpdateSection']);
Route::get('/section/delete/{id}',[SectionController::class, 'DeleteSection']);

///Students  Routes
Route::get('/student',[StudentController::class, 'Index']);
Route::post('/student/store',[StudentController::class, 'StoreStudent']);
Route::get('/student/edit/{id}',[StudentController::class, 'EditStudent']);
Route::post('/student/update/{id}',[StudentController::class, 'UpdateStudent']);
Route::get('/student/delete/{id}',[StudentController::class, 'DeleteStudent']);

