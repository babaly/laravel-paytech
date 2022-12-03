<?php

use App\Http\Controllers\PaymentController;

Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/checkout', [PaymentController::class, 'payment'])->name('payment.submit');
Route::get('ipn', [PaymentController::class, 'ipn'])->name('paytech-ipn');
Route::get('payment-success/{code}', [PaymentController::class, 'success'])->name('payment.success');
Route::get('payment/{code}/success', [PaymentController::class, 'paymentSuccessView'])->name('payment.success.view');
Route::get('payment-cancel', [PaymentController::class, 'cancel'])->name('paytech.cancel');
