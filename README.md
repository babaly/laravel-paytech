# Laravel Paytech Payment

[![Latest Version on Packagist](https://img.shields.io/packagist/v/babaly/laravel-paytech.svg?style=flat-square)](https://packagist.org/packages/babaly/laravel-paytech)

[![Total Downloads](https://img.shields.io/packagist/dt/babaly/laravel-paytech.svg?style=flat-square)](https://packagist.org/packages/babaly/laravel-paytech)

## Description

This package help laravel developpers to use the [paytech](https://paytech.sn/) payment methods created by [Intech-group](https://intech.sn/).

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

![Alt text](https://user-images.githubusercontent.com/65746012/205400258-1fb6543f-5541-45e0-8f07-4d56a3164f60.png)

Click the button to validate the command and you'll be redirected to paytech platform payment

![Alt text]([http://full/path/to/img.jpg](https://github.com/babaly/laravel-paytech/../../../../paytech2.png) 

![Alt text]([http://full/path/to/img.jpg](https://github.com/babaly/laravel-paytech/../../../../paytech3.png) 

![Alt text]([http://full/path/to/img.jpg](https://github.com/babaly/laravel-paytech/../../../../paytech4.png) 

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
