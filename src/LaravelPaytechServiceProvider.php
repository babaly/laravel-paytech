<?php

namespace Babaly\LaravelPaytech;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelPaytechServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-paytech')
            ->hasConfigFile('paytech')
            ->hasViews()
            ->publishesServiceProvider('TestPackages')
            ->hasRoute('web')
            ->hasMigration('create_payment_table')
            ->runsMigrations()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Hello, and welcome to paytech package!');
                    })
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->copyAndRegisterServiceProviderInApp()
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Thank you for your trust and Have a great day!');
                    });
            });
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->publishes([
            $this->package->basePath("/../Models/Payment.php.stub") => base_path("app/Models/Payment.php"),
        ], "{$this->package->shortName()}-models");

        $this->publishes([
            $this->package->basePath("/../Http/Controllers/PaymentController.php.stub") => base_path("app/Http/Controllers/PaymentController.php"),
        ], "{$this->package->shortName()}-controllers");

        $this->publishes([
            $this->package->basePath("/../Http/Requests/PaymentRequest.php.stub") => base_path("app/Http/Requests/PaymentRequest.php"),
        ], "{$this->package->shortName()}-requests");

        $this->publishes([
            $this->package->basePath("/../routes/web.php") => base_path("routes/web.php"),
        ], "{$this->package->shortName()}-routes");

        $this->publishes([
            $this->package->basePath("/../services/PaytechService.php") => base_path("app/Http/Services/PaytechService.php"),
        ], "{$this->package->shortName()}-services");
    }
}
