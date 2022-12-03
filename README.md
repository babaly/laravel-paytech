# Laravel Paytech Payment

[![Latest Version on Packagist](https://img.shields.io/packagist/v/babaly/laravel-paytech.svg?style=flat-square)](https://packagist.org/packages/babaly/laravel-paytech)

[![Total Downloads](https://img.shields.io/packagist/dt/babaly/laravel-paytech.svg?style=flat-square)](https://packagist.org/packages/babaly/laravel-paytech)

## Description

This package help laravel developers to use the [paytech](https://paytech.sn/) payment methods created by [Intech-group](https://intech.sn/).

[<img src="https://paytech.sn/assets/srcs/img/new-image/paytech-7.png" width="419px" />]

## Installation

You can install the package via composer:

```bash
composer require babaly/laravel-paytech
```

Add the service provider to config/app.php into providers section

```php
return [
    'providers' => [
        ...
        App\Providers\PaytechServiceProvider::class
    ]
];
```
You can publish all tags by running the command

```bash
php artisan vendor:publish --provider="Babaly\LaravelPaytech\LaravelPaytechServiceProvider"
```

--OR--

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-paytech-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-paytech-config"
```

This is the contents of the published config file:

```php
return [
    'PAYTECH_API_KEY' => '',
    'PAYTECH_SECRET_KEY' => '',
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-paytech-views"
```

You can publish the services file with:

```bash
php artisan vendor:publish --tag="laravel-paytech-services"
```

You can publish the model file with:

```bash
php artisan vendor:publish --tag="laravel-paytech-models"
```

You can publish the controller file with:

```bash
php artisan vendor:publish --tag="laravel-paytech-controllers"
```

## Usage

Copy the API_SECRET_KEY and API_KEY from your paytech account and paste it to the config file with somethings likde this

```php
return [
    'PAYTECH_API_KEY' => '',
    'PAYTECH_SECRET_KEY' => '',
];
```

Run Your application with the artisan command

```bash
php artisan serve
```

After that, visit the payment route to test payment platform

```php
http://127.0.0.1:8000/payment
```

NB: Make sure that the routes is copied to default route web, else, copied the next line to your route file

```php
use App\Http\Controllers\PaymentController;

Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/checkout', [PaymentController::class, 'payment'])->name('payment.submit');
Route::get('ipn', [PaymentController::class, 'ipn'])->name('paytech-ipn');
Route::get('payment-success/{code}', [PaymentController::class, 'success'])->name('payment.success');
Route::get('payment/{code}/success', [PaymentController::class, 'paymentSuccessView'])->name('payment.success.view');
Route::get('payment-cancel', [PaymentController::class, 'cancel'])->name('paytech.cancel');
```

A windows like this image will appear if everythings is ok

![Alt text](https://user-images.githubusercontent.com/65746012/205413240-23dbf575-3ac1-4ee6-b0c9-8b367be42ff2.png)

Click the button to validate the command and you'll be redirected to paytech platform payment

![Alt text](https://user-images.githubusercontent.com/65746012/205413259-7fca6061-44a9-4cba-8332-0f4ed655d7be.png)

![Alt text](https://user-images.githubusercontent.com/65746012/205413273-e8a783d1-d89d-4722-b125-f6153b431fc7.png)

![Alt text](https://user-images.githubusercontent.com/65746012/205413285-02dbe1fd-9f20-4064-9407-96aaca82d7ec.png)

![Alt text](https://user-images.githubusercontent.com/65746012/205413298-452af97f-fc1e-41d6-89ba-218c21291984.png)

## Mode Production

Don't forget to set test mode to false if you're in production. You can disabled to the controller
by calling methods setTestMode(false) or enable the live mode with setLiveMode(true).

If you're in test mode, Paytech retrieve just 100xof for any of your transactions amount. See more about transactions to their [documentation](https://paytech.sn/)

See their [documentation](https://doc.paytech.sn/) for more information
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Baba LY](https://github.com/babaly)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
