<?php

namespace JM\Viewable\Tests;

use Illuminate\Support\Facades\Artisan;
use JM\Viewable\ViewableServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('make:model Post -a -n');
        Artisan::call('make:model User -a -n');
        Artisan::call('migrate -n');
    }

    protected function getPackageProviders($app)
    {
        return [
            ViewableServiceProvider::class,
        ];
    }
}