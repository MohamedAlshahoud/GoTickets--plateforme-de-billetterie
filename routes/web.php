<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/search', [EventController::class, 'search'])->name('search.events');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::get('/profile/orders/{order}', [ProfileController::class, 'showOrder'])->name('profile.orders.show');
});



Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Cart routes
Route::middleware('auth')->group(function () {
    Route::post('/cart/add/{event}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');
});

// Checkout routes
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/confirm', [CheckoutController::class, 'confirm'])->name('checkout.confirm');
});

// Payment routes (Stripe)
Route::middleware('auth')->group(function () {
    Route::get('/checkout/payment/{order}', [PaymentController::class, 'checkout'])->name('stripe.checkout');
    Route::post('/payment/session/{order}', [PaymentController::class, 'createCheckoutSession'])->name('stripe.session');
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
});


Route::view('/apropos', 'apropos')->name('apropos');

Route::get('/liste-evenements', [EventController::class, 'list'])->name('events.list');

Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

Route::get('/email/verified', function () {
    return view('auth.email-verified');
})->middleware(['auth'])->name('verification.confirmed');


require __DIR__.'/auth.php';
