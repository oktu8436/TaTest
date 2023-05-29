<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordConfirmationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

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

Route::view('/', 'welcome')->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'index'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])
        ->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password', [ResetPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])
        ->name('password.update');

});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');

    Route::get('/email/verify/', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware('signed')
        ->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, '__invoke'])
        ->name('verification.send');

    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');//middleware(['verified', 'password.confirm'])

    Route::get('/confirm-password', [PasswordConfirmationController::class, 'show'])
        ->name('password.confirm');
    Route::post('/confirm-password', [PasswordConfirmationController::class, 'store']);

    Route::get('/tests/create', [TestController::class, 'create'])->middleware('verified')->name('tests.create');
    Route::post('/tests', [TestController::class, 'store'])->middleware('verified')->name('tests.store');

    Route::get('/questions/create/{test}{num_ques}', [QuestionController::class, 'create'])->middleware('verified')
        ->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->middleware('verified')->name('questions.store');

    Route::get('/tests/{id}/answers', [AnswerController::class, 'create'])->middleware('verified')->name('answers.create');
    Route::post('/answers', [AnswerController::class, 'store'])->middleware('verified')->name('answers.store');

    Route::get('/results/{id}', [ResultController::class, 'show'])->middleware('verified')->name('results.show');
    Route::post('/results', [AnswerController::class, 'store'])->middleware('verified')->name('results.store');
});

Route::get('/tests', [TestController::class, 'index'])->name('tests.index');
Route::get('/tests/{id}', [TestController::class, 'show'])->name('tests.show');
