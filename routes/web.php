<?php

use App\Livewire\Admin\Category\CategoryCreate;
use App\Livewire\Admin\Category\CategoryEdit;
use App\Livewire\Admin\Category\CategoryIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Product\ProductCreate;
use App\Livewire\Admin\Product\ProductEdit;
use App\Livewire\Admin\Product\ProductIndex;
use App\Livewire\Admin\Staff\StaffCreate;
use App\Livewire\Admin\Staff\StaffEdit;
use App\Livewire\Admin\Staff\StaffIndex;
use App\Livewire\Staff\Dashboard as StaffDashboard;
use App\Livewire\Staff\Transaction\TransactionCreate as TransactionTransactionCreate;
use App\Livewire\Staff\Transaction\TransactionIndex as TransactionTransactionIndex;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', StaffDashboard::class)->middleware(['staff', 'auth'])->name('staff.dashboard');
Route::get('transaksi', TransactionTransactionIndex::class)->middleware(['staff', 'auth'])->name('staff.transaksi');
Route::get('transaksi/buat', TransactionTransactionCreate::class)->middleware(['staff', 'auth'])->name('staff.transaksi.buat');

Auth::routes(['register' => false]);


Route::prefix('admin')->middleware(['admin', 'auth'])->group(function () {
    Route::get('/', Dashboard::class)->name('admin.dashboard');

    Route::get('kategori', CategoryIndex::class)->name('admin.kategori');
    Route::get('kategori/buat', CategoryCreate::class)->name('admin.kategori.buat');
    Route::get('kategori/edit/{id}', CategoryEdit::class)->name('admin.kategori.edit');

    Route::get('produk', ProductIndex::class)->name('admin.produk');
    Route::get('produk/buat', ProductCreate::class)->name('admin.produk.buat');
    Route::get('produk/edit/{id}', ProductEdit::class)->name('admin.produk.edit');

    Route::get('staff', StaffIndex::class)->name('admin.staff');
    Route::get('staff/buat', StaffCreate::class)->name('admin.staff.buat');
    Route::get('staff/edit/{id}', StaffEdit::class)->name('admin.staff.edit');
});
