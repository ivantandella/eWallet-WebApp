<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashOutController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('auth.login');
})->name('logout');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::get('/profile/{pin}/pin', [UserController::class, 'pin'])->name('pin');
Route::put('/profile/{pin}', [UserController::class, 'updatePIN'])->name('updatePIN');

Route::get('/topup', [TopUpController::class, 'index'])->name('topup');
Route::post('/topup', [TopUpController::class, 'submit'])->name('topup.submit');

Route::get('/transfer', [TransferController::class, 'index'])->name('transfer');
Route::put('/transfer/{transfer}', [TransferController::class, 'send'])->name('transfer.send');

Route::get('/cashout', [CashOutController::class, 'index'])->name('cashout');
Route::put('/cashout/{cashout}', [CashOutController::class, 'send'])->name('cashout.send');

Route::get('/pln', [PembayaranController::class, 'pln'])->name('pln');
Route::put('/pln/{pln}', [PembayaranController::class, 'payPLN'])->name('payPLN');

Route::get('/pdam', [PembayaranController::class, 'pdam'])->name('pdam');
Route::put('/pdam/{pdam}', [PembayaranController::class, 'payPDAM'])->name('payPDAM');

Route::get('/pulsa', [PembayaranController::class, 'pulsa'])->name('pulsa');
Route::put('/pulsa/{pulsa}', [PembayaranController::class, 'payPulsa'])->name('payPulsa');

Route::get('/internet', [PembayaranController::class, 'internet'])->name('internet');
Route::put('/internet/{internet}', [PembayaranController::class, 'payInternet'])->name('payInternet');

Route::get('/history', [HistoryController::class, 'index'])->name('history');

Route::get('/admin/home', [AdminController::class, 'index']);
Route::get('/admin/user', [AdminController::class, 'user']);
Route::get('/admin/user/hapus/{id}', [AdminController::class, 'deleteUser']);
Route::get('/admin/user/pulihkan/{id}', [AdminController::class, 'restoreUser']);
Route::get('/admin/layanan', [AdminController::class, 'layanan']);
Route::get('/admin/transaksi', [AdminController::class, 'transaksi']);
Route::post('/admin/tambah/layanan', [AdminController::class, 'tambahLayanan']);
Route::get('/admin/cashout', [AdminController::class, 'cashout']);
Route::get('/admin/topup', [AdminController::class, 'topup']);
Route::get('/admin/topup/konfirmasi/{id}', [AdminController::class, 'konfirmasiTopup']);
Route::get('/admin/topup/tolak/{id}', [AdminController::class, 'tolakTopup']);
Route::get('/admin/transfer', [AdminController::class, 'transfer']);
Route::get('/admin/history/{id}', [AdminController::class, 'history']);
