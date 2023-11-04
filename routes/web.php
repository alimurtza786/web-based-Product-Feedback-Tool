<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\AdminAuthController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/feeback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/feeback-list', [FeedbackController::class, 'list'])->name('feedback-list');
    Route::get('/feedback/{feedback}', [FeedbackController::class, 'show'])->name('feedback.show');
Route::post('/feedback/{feedback}/comments', [FeedbackController::class, 'commentshow'])->name('comment.store');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';






Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('adminDashboard');

        Route::get('/feedback', [AdminAuthController::class, 'feedback'])->name('admin.feedback');
        Route::get('/user', [AdminAuthController::class, 'user'])->name('admin.user');
        Route::post('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
        Route::delete('/deleteUser/{id}', [AdminAuthController::class, 'deleteUser'])->name('admin.deleteUser');
        Route::delete('/deleteFeedback/{id}', [AdminAuthController::class, 'deleteFeedback'])->name('admin.deleteFeedback');
        Route::post('/toggleStatus/{id}', [AdminAuthController::class, 'toggleStatus'])->name('admin.toggleStatus');






    });
});
