<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GroomingController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PetHotelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function () {
    return Redirect::route('landing_page');
});

Route::get('/orino-page', [LandingController::class, 'landing_page'])->name('landing_page');

Auth::routes();

// Product
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::middleware(['admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');

        Route::post('/order/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('admin.order.confirm');
        Route::post('/order/{order}/rejectPayment', [OrderController::class, 'reject_payment'])->name('admin.order.rejectPayment');
        Route::get('/order/{order}/accept', [OrderController::class, 'acceptOrder'])->name('admin.order.accept');
        Route::post('/order/{order}/reject', [OrderController::class, 'rejectOrder'])->name('admin.order.reject');

        Route::resource('order', OrderController::class, ['as' => 'admin']);
        Route::resource('grooming', GroomingController::class, ['as' => 'admin'])->except('store');
        Route::resource('pethotel', PetHotelController::class, ['as' => 'admin'])->except('store');
        Route::resource('feedback', FeedbackController::class, ['as' => 'admin']);

        Route::get('/filter', [OrderController::class, 'filter'])->name('filter');
    });
});

Route::get('/grooming-page', [GroomingController::class, 'grooming_page'])->name('grooming_page');
Route::get('/pethotel', [PetHotelController::class, 'pethotel_page'])->name('pethotel_page');

Route::middleware(['auth'])->group(function () {
    Route::resource('feedback', FeedbackController::class)->except(['store', 'index']);

    Route::post('/grooming', [GroomingController::class, 'store'])->name('grooming.store');
    Route::post('/grooming/jadwal', [GroomingController::class, 'checkJadwal'])->name('grooming.check-jadwal');

    Route::post('/pethotel', [PetHotelController::class, 'store'])->name('pethotel.store');

    // Checkout and Order

    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order', [OrderController::class, 'index_order'])->name('index_order');
    Route::get('/order/{order}', [OrderController::class, 'show_order'])->name('show_order');
    Route::post('/order/{order}/pay', [OrderController::class, 'submit_payment_receipt'])->name('order.pay');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile');
    Route::post('/profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');
});
