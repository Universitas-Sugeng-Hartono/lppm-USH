<?php

use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\{FormulirController, KaryaController};
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\AccProposalController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenelitianPengabdianController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\TampilanController;
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

// Route::get('/', function () {
//     return view('layout.app');
// });
Route::get('/', [TampilanController::class, 'index']);
Route::get('/indexp', [PengumumanController::class, 'pengumumanReview']);
Route::get('/indexhki', [FormulirController::class, 'hkiView']);
Route::get('/indexformulir', [FormulirController::class, 'formulirReview']);
Route::get('/indexpengumuman', [PengumumanController::class, 'pengumumanReview']);
Route::get('/loginn', [LoginController::class, 'getLogin'])->name('loginn');
Route::post('/login', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'postLogout']);
Route::middleware('auth:web')->group(function () {
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('dashboard', DashboardController::class);
    Route::resource('formulir', FormulirController::class);
    Route::resource('proposal', ProposalController::class);
    Route::put('/review2/{id}', [ProposalController::class, 'postReview2']);
    Route::get('/create-review/{id}', [ProposalController::class, 'getReview1']);
    Route::get('/create-ubah/{id}', [ProposalController::class, 'ubah']);
    Route::get('/create-review2/{id}', [ProposalController::class, 'getReview2']);
    Route::get('/accadmin/{id}', [ProposalController::class, 'accReview']);
    Route::get('/create-acc/{id}', [ProposalController::class, 'sessionAcc']);
    Route::get('/proposalpenelitian', [ProposalController::class, 'Penelitian'])->name('proposalpenelitian');
    Route::get('/proposalpengabdian', [ProposalController::class, 'Pengabdian'])->name('proposalpengabdian');
    Route::get('/createpengabdian', [ProposalController::class, 'CreatePengabdian']);
    Route::get('/createpenelitian', [ProposalController::class, 'CreatePenelitian']);
    Route::post('/storepengabdian', [ProposalController::class, 'storePengabdian'])->name('storepengabdian');
    Route::post('/storepenelitian', [ProposalController::class, 'storePenelitian'])->name('storepenelitian');
    Route::resource('acc', AccProposalController::class);
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('pelaporan', PelaporanController::class);
    Route::get('/createpelaporanpengabdian', [PelaporanController::class, 'CreatePengabdian']);
    Route::get('/pelaporanpengabdian', [PelaporanController::class, 'Pengabdian']);
    Route::resource('user', UserController::class);
    Route::get('/viewuser', [UserController::class, 'UserView']);
    Route::post('/update-user', [UserController::class, 'updateUser'])->name('update-user');
    Route::resource('pp', PenelitianPengabdianController::class);
    Route::resource('record', RecordController::class);
    Route::resource('karya', KaryaController::class);
    Route::put('/karya/update-status/{id}', [KaryaController::class, 'updateStatus'])->name('karya.update.status');
});
