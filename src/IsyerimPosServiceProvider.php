<?php

namespace Mkeremcansev\IsyerimPos;

use Mkeremcansev\IsyerimPos\Commands\IsyerimPosCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class IsyerimPosServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('isyerim-pos')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_isyerim-pos_table')
            ->hasCommand(IsyerimPosCommand::class);
    }
}
