<?php

use App\Http\Controllers\ContainerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TipeContainerController;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', UserController::class);
    Route::put('users/{user}/activate', [UserController::class, 'activate'])->name('activate');
    Route::resource('documents', DocumentController::class);
    Route::get('documents/detail/{id}', [DocumentController::class, 'detail'])->name('documents.detail');
    Route::get('/exportexcel', [DocumentController::class, 'exportexcel'])->name('documents.exportexcel');

    Route::resource('containers', ContainerController::class);

    Route::resource('invoices', InvoiceController::class);
    Route::get('invoices/detail/{invoice}', [InvoiceController::class, 'detail'])->name('invoices.detail');
    Route::get('invoices/download/{invoice}', [InvoiceController::class, 'download'])->name('invoices.download');

    Route::resource('orders', OrderController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('shippings', ShippingController::class);
    Route::resource('tipecontainers', TipeContainerController::class);
    Route::get('shippings/detail/{id}', [ShippingController::class, 'detail'])->name('shippings.detail');
    Route::get('shippings/download/{id}', [ShippingController::class, 'download'])->name('shippings.download');

    Route::get('listdocument', [DocumentController::class, 'list'])->name('list.documents');
    Route::get('listshipping', [ShippingController::class, 'list'])->name('list.shippings');
    Route::get('listinvoice', [InvoiceController::class, 'list'])->name('list.invoices');
    Route::get('report', [ReportController::class, 'index'])->name('report.index');

    Route::get('/about', function () {
        return view('gudang.about');
    });
});
