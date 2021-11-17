<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\mployeeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BookingController;
use App\Models\Employee;
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

Route::get('/', function () {
    return view('welcome');
})->name('start');

Route::get('/adminlog/login/secret',function() {
    if(session('adminNow')==null) {
        return view('welcome');
    } else {
    
        return view('adminSection');
    }
})->name('adin');

Route::get('/admin/emp/addnew', function () {
    return view('adminEmpAdd');
})->name('addEmp');

Route::post('/emp/log',[mployeeController::class,'empLog'])->name('empLogin');
Route::get('/adminC',[adminController::class,'makeAdmin']);
Route::post('/adminC/Create',[adminController::class,'CreateAdmin'])->name('add_admin');
Route::get('/adminlog',[adminController::class,'adminPage'])->name('adminlogin');
Route::post('/adminlog/login',[adminController::class,'AdminCheck'])->name('adminlogincheck');
Route::get('/admin/logout',[adminController::class,'adminLogout'])->name('adminout');
Route::get('/admin/emp',[adminController::class,'empManage'])->name('emp');
Route::post('/admin/emp/add',[mployeeController::class,'empAddN'])->name('empAdd');
Route::get('/admin/emp/view',[mployeeController::class,'empAll'])->name('viewEmp');
Route::get('empUpdate/{id}',[mployeeController::class,'empUpdate']);
Route::post('empEdit/{id}',[mployeeController::class,'empUpdateFinal']);
Route::get('empDel/{id}',[mployeeController::class,'empDelete']);
Route::get('/admin/emp/Stocks',[StockController::class,'stockPage'])->name('StockManage');
Route::get('/admin/emp/Stocks/add',[StockController::class,'stockaddPage'])->name('StockAddPage');
Route::post('admin/stock/add/proc/d',[StockController::class,'stocker'])->name('stockerAdd');
Route::get('/admin/emp/Stocks/glance',[StockController::class,'Stockv1'])->name('StockViewG');
Route::get('Stocks/stockDetails/{id}',[StockController::class,'StockDetailed']);
Route::get('StockUpdate/{id}',[StockController::class,'StockUpdate']);
Route::get('StockDel/{id}',[StockController::class,'StockDel']);
Route::post('StockEditFinal/{id}/{id2}',[StockController::class,'StockAlter']);
Route::get('/emp/Book',[mployeeController::class,'empBookCar'])->name('empBookNew');
Route::get('/emp/view/Stock',[mployeeController::class,'empStockViewAll'])->name('empStockView');
Route::get('Book/stockDetails/{id}',[StockController::class,'stockBookDetails']);
Route::get('book/page/{id}',[BookingController::class,'BookNav']);
Route::post('new/start',[BookingController::class,'BookProcess'])->name('bookFinal2');
Route::get('/Bookings/stat',[BookingController::class,'BookingStat'])->name('Adminbooking');
Route::get('/emp/logout',[mployeeController::class,'empLogout'])->name('empLogOut');
Route::get('/book/apr/{id}',[BookingController::class,'bookAppr']);
Route::get('/book/dspr/{id}',[BookingController::class,'bookDspr']);

