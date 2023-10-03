<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/employees/employeeList', [EmployeeController::class, 'listView'])->name('employee.list')->middleware('auth');


Route::get('/employees/employeeList', [EmployeeController::class, 'list'])->name('employeeHome')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/employees/employeeCreate', [EmployeeController::class, 'create'])->name('employee.create')->middleware('auth');

Route::post('/employees', [EmployeeController::class, 'store'])->name('employee.store')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();