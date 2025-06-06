<?php

declare(strict_types=1);

namespace LaravelLang\MoonShine;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LaravelLang\Publisher\Plugins\Provider;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        if (class_exists(Provider::class)) {
            $this->app->register(Plugin::class);
        }
    }
}
