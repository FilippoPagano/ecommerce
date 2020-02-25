<?php

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
use App\Product;
Route::get('/', function () {
    $products = Product::orderBy('created_at', 'asc')->get();

    return view('products', [
        'products' => $products
    ]);
});

Route::post('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::post('/pay', function () {
	\Stripe\Stripe::setApiKey('sk_test_huTgMiS49ErsFZdlGH8UFpPN00a481rVvK');

	$intent = \Stripe\PaymentIntent::create([
		'amount' => 1000,
		'currency' => 'eur',
	]);

    return view('pay', [
        'client_secret' => $intent->client_secret
	]);
});