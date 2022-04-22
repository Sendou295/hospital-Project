<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Admin
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.admin_login');
Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'show_dashboard'])->name('admin.dashboard');
Route::get('/logout-admin', [\App\Http\Controllers\AdminController::class, 'logout_admin']);
Route::post('/admin-dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard']);

//Base
Route::get('/add-base', [\App\Http\Controllers\baseController::class, 'add_base']);
Route::get('/edit-base/{base_id}', [\App\Http\Controllers\baseController::class, 'edit_base']);
Route::get('/delete-base/{base_id}', [\App\Http\Controllers\baseController::class, 'delete_base']);
Route::get('/all-categories', [\App\Http\Controllers\baseController::class, 'all_categories']);

Route::get('/active-base/{base_id}', [\App\Http\Controllers\baseController::class, 'active_base']);
Route::get('/unactive-base/{base_id}', [\App\Http\Controllers\baseController::class, 'unactive_base']);

Route::post('/save-base', [\App\Http\Controllers\baseController::class, 'save_base']);
Route::post('/update-base/{base_id}', [\App\Http\Controllers\baseController::class, 'update_base']);

//Department
Route::get('/add-department', [\App\Http\Controllers\departmentController::class, 'add_department']);
Route::get('/edit-department/{department_id}', [\App\Http\Controllers\departmentController::class, 'edit_department']);
Route::get('/delete-department/{department_id}', [\App\Http\Controllers\departmentController::class, 'delete_department']);
Route::get('/all-departments', [\App\Http\Controllers\departmentController::class, 'all_departments']);

Route::get('/active-department/{department_id}', [\App\Http\Controllers\departmentController::class, 'active_department']);
Route::get('/unactive-department/{department_id}', [\App\Http\Controllers\departmentController::class, 'unactive_department']);

Route::post('/save-department', [\App\Http\Controllers\departmentController::class, 'save_department']);
Route::post('/update-department/{department_id}', [\App\Http\Controllers\departmentController::class, 'update_department']);

//Service
Route::get('/add-service', [\App\Http\Controllers\serviceController::class, 'add_service']);
Route::get('/edit-service/{service_id}', [\App\Http\Controllers\serviceController::class, 'edit_service']);
Route::get('/delete-service/{service_id}', [\App\Http\Controllers\serviceController::class, 'delete_service']);
Route::get('/all-services', [\App\Http\Controllers\serviceController::class, 'all_services']);

Route::get('/active-service/{service_id}', [\App\Http\Controllers\serviceController::class, 'active_service']);
Route::get('/unactive-service/{service_id}', [\App\Http\Controllers\serviceController::class, 'unactive_service']);

Route::post('/save-service', [\App\Http\Controllers\serviceController::class, 'save_service']);
Route::post('/update-service/{service_id}', [\App\Http\Controllers\serviceController::class, 'update_service']);

//Special Service
Route::get('/add-special_service', [\App\Http\Controllers\special_serviceController::class, 'add_special_service']);
Route::get('/edit-special_service/{special_service_id}', [\App\Http\Controllers\special_serviceController::class, 'edit_special_service']);
Route::get('/delete-special_service/{special_service_id}', [\App\Http\Controllers\special_serviceController::class, 'delete_special_service']);
Route::get('/all-special_services', [\App\Http\Controllers\special_serviceController::class, 'all_special_services']);

Route::get('/active-special_service/{special_service_id}', [\App\Http\Controllers\special_serviceController::class, 'active_special_service']);
Route::get('/unactive-special_service/{special_service_id}', [\App\Http\Controllers\special_serviceController::class, 'unactive_special_service']);

Route::post('/save-special_service', [\App\Http\Controllers\special_serviceController::class, 'save_special_service']);
Route::post('/update-special_service/{special_service_id}', [\App\Http\Controllers\special_serviceController::class, 'update_special_service']);

//Equipment
Route::get('/add-equipment', [\App\Http\Controllers\equipmentController::class, 'add_equipment']);
Route::get('/edit-equipment/{equipment_id}', [\App\Http\Controllers\equipmentController::class, 'edit_equipment']);
Route::get('/delete-equipment/{equipment_id}', [\App\Http\Controllers\equipmentController::class, 'delete_equipment']);
Route::get('/all-equipments', [\App\Http\Controllers\equipmentController::class, 'all_equipments']);

Route::get('/active-equipment/{equipment_id}', [\App\Http\Controllers\equipmentController::class, 'active_equipment']);
Route::get('/unactive-equipment/{equipment_id}', [\App\Http\Controllers\equipmentController::class, 'unactive_equipment']);

Route::post('/save-equipment', [\App\Http\Controllers\equipmentController::class, 'save_equipment']);
Route::post('/update-equipment/{equipment_id}', [\App\Http\Controllers\equipmentController::class, 'update_equipment']);

//Specialist
Route::get('/add-specialist', [\App\Http\Controllers\specialistController::class, 'add_specialist']);
Route::get('/edit-specialist/{specialist_id}', [\App\Http\Controllers\specialistController::class, 'edit_specialist']);
Route::get('/delete-specialist/{specialist_id}', [\App\Http\Controllers\specialistController::class, 'delete_specialist']);
Route::get('/all-categories', [\App\Http\Controllers\specialistController::class, 'all_categories']);

Route::get('/active-specialist/{specialist_id}', [\App\Http\Controllers\specialistController::class, 'active_specialist']);
Route::get('/unactive-specialist/{specialist_id}', [\App\Http\Controllers\specialistController::class, 'unactive_specialist']);

Route::post('/save-specialist', [\App\Http\Controllers\specialistController::class, 'save_specialist']);
Route::post('/update-specialist/{specialist_id}', [\App\Http\Controllers\specialistController::class, 'update_specialist']);
