<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class);
Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::post('sales/store', [SaleController::class, 'store'])->name('sales.store');

Route::get('customers/no-sales', [ReportController::class, 'noSales'])->name('no-sales');
Route::get('sales/all-sales', [ReportController::class, 'allSales'])->name('all-sales');
Route::get('customers/sales-count', [ReportController::class, 'salesCount'])->name('sales-count');
Route::get('sales/item-sales', [ReportController::class, 'itemSales'])->name('item-sales');
