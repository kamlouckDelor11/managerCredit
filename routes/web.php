<?php

use App\Http\Controllers\ActionRecouveryController;
use App\Http\Controllers\CautionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\GarantieController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\UpaidController;
use App\Models\Branch;
use App\Models\Credit;
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
    $branches = Branch::all();
    $credits = Credit::all();
    return view('welcome', ['branches'=>$branches, '$credits'=>$credits]);
});

Route::post('credit/add', [CreditController::class, 'store'])->name('credit.store');
Route::post('credit/single', [CreditController::class, 'loanFolder'])->name('credit.loanFolder');
Route::post('credit/display', [CreditController::class, 'index'])->name('credit.index');

Route::get('credit/{credit}', [CreditController::class, 'show'])->name('credit.show');
Route::post('credit/update/{credit}', [CreditController::class, 'updateStatusFolder'])->name('credit.updateStatusFolder');
Route::post('credit/approve/{credit}', [CreditController::class, 'approveFolder'])->name('credit.approveFolder');

Route::post('comment/add/', [CommentController::class, 'store'])->name('comment.store');
Route::post('opinion/add', [OpinionController::class, 'store'])->name('opinion.store');

Route::post('caution/add{credit}',[CautionController::class, 'store'])->name('caution.store');

Route::post('garantie/add{credit}',[GarantieController::class, 'store'])->name('garantie.store');

Route::post('upaid/add{credit}',[UpaidController::class, 'store'])->name('upaid.store');
Route::post('upaid/display', [UpaidController::class, 'index'])->name('upaid.index');
Route::get('pret/{upaid}', [UpaidController::class, 'show'])->name('upaid.show');
Route::post('pret/recouvery/{upaid}', [UpaidController::class, 'recouvery'])->name('upaid.recouvery');

Route::post('upaid/add/action/{upaid}',[ActionRecouveryController::class, 'store'])->name('actionRecovery.store');