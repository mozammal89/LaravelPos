<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ExpanseController;
use App\Http\Controllers\Api\ExtraController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SalaryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\PosController;

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

// Auth Route  
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('/singup',[AuthController::class, 'singup']);
    Route::post('/login',[AuthController::class, 'login']);
    Route::post('/logout',[AuthController::class, 'logout']);
    Route::post('/refresh',[AuthController::class, 'refresh']);
    Route::post('/me',[AuthController::class, 'me']);
});


// Employee Route 
Route::apiResource('/employee',EmployeeController::class);

// Employee Route 
Route::apiResource('/supplier',SupplierController::class);

//Category Route
Route::apiResource('/category',CategoryController::class);

//Product Route
Route::apiResource('/product',ProductController::class);

//product stock
Route::Post('/stock/update/{id}',[ProductController::class,'stockUpdate'])->name('stock.update');


//Expanse Route
Route::apiResource('/expanse',ExpanseController::class);

//Salary Route
Route::Post('/salary/paid/{id}',[SalaryController::class,'Paid'])->name('salary.paid');
Route::Get('/salary',[SalaryController::class,'AllSalary'])->name('all.salary');
Route::Get('/salary/view/{id}',[SalaryController::class,'ViewSalary'])->name('view.salary');
Route::Get('/edit/salary/{id}',[SalaryController::class,'EditSalary'])->name('edit.salary');
Route::Post('/salary/update/{id}',[SalaryController::class,'UpdateSalary'])->name('update.salary');


//customer route
Route::apiResource('/customer',CustomerController::class);

//pos route
Route::get('/getting/product/{id}',[PosController::class,'getProduct'])->name('get.product');

// cart route 
Route::get('/addToCart/{id}',[CartController::class,'addToCart'])->name('add.to.cart');
Route::get('/cart/product/',[CartController::class,'cartProduct'])->name('cart.product');
Route::get('/removeItem/{id}',[CartController::class,'removeItem'])->name('remove.item');
Route::get('/increment/{id}',[CartController::class,'incrementItem'])->name('increment.item');
Route::get('/decrement/{id}',[CartController::class,'decrementItem'])->name('decrement.item');
// order done 
Route::post('/order-done',[PosController::class,'orderDone'])->name('order.done');
Route::get('/today-order',[OrderController::class,'todayOrder'])->name('today.order');

//Extra/vat Route
Route::apiResource('/extra',ExtraController::class);

Route::get('/vats',[ExtraController::class,'getVat'])->name('get.vat');