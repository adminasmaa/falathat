<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production'))
            URL::forceScheme('https');

        if (Schema::hasTable('languages'))
            View::share('languages', Language::all());

        if (Schema::hasTable('messages'))
            View::share('pendingMessages', Message::where('opened', 0)->count());

        if (Schema::hasTable('settings'))
            View::share('settings', Setting::all()->groupBy('section')->map(function ($settings) {
                $mappedSettings = [];
                $settings->each(function ($setting) use (&$mappedSettings) {
                    $mappedSettings[$setting->key] = $setting->value('ar');
                });
                return $mappedSettings;
            }));

        Schema::defaultStringLength(191);
    }
}
