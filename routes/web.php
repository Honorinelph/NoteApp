<?php

use App\Http\Controllers\Admin\v1\AdminController;
use App\Http\Controllers\Admin\v1\CommentController;
use App\Http\Controllers\Admin\v1\CriterionNotationController;
use App\Http\Controllers\Admin\v1\NotationController;
use App\Http\Controllers\Admin\v1\UniversityController;
use App\Http\Controllers\Admin\v1\UniversityRankingController;
use App\Http\Controllers\Admin\v1\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[HomeController::class,'homepage']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });
Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function (){
    Route::resource('/universities', UniversityController::class);
    Route::resource('/comments', CommentController::class);
    Route::resource('/criteres', CriterionNotationController::class);
    Route::resource('/notations', NotationController::class);
    Route::resource('/users', UserController::class);

    Route::get('/rankings',[UniversityRankingController::class,'showRankings'])->name('rankings');
});

// routes\web.php

Route::middleware(['auth'])->group(function () {
    Route::post('/universities/{university}/comments', [FrontendController::class, 'store'])->name('universities.comments.store');
    Route::delete('/universities/{university}/comments/{comment}', [FrontendController::class, 'destroy'])->name('universities.comments.destroy');
    Route::get('/universities/{university}',[FrontendController::class,'details'])->name('universities.detail');

});


Route::middleware('auth')->group(function (){
    Route::get('/universities', [FrontendController::class,'listuniversities'])->name('user.universities');
    Route::resource('/notes',NoteController::class);
    Route::get('/notoations/{notation}',[NotationController::class,'detail'])->name('notes.details');
    Route::get('/notations/history',[NotationController::class,'history'])->name('notations.history');

    Route::get('/rankings/univers',[FrontendController::class,'classement'])->name('rankings.classement');
});




require __DIR__.'/auth.php';
