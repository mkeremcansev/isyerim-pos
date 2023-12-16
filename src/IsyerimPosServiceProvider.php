<?php

namespace Mkeremcansev\IsyerimPos;

use Mkeremcansev\IsyerimPos\Services\IsyerimPOS;
use Mkeremcansev\IsyerimPos\Services\IsyerimPOSInterface;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class IsyerimPosServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('isyerim-pos');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/isyerim-pos.php' => config_path('isyerim-pos.php'),
        ], 'isyerim-pos-config');

        $this->app->bind(
            IsyerimPOSInterface::class,
            IsyerimPOS::class
        );
    }
}
