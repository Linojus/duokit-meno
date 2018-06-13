<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // config/app ir tada locale
        \Carbon\Carbon::setLocale(config('app.locale'));
        setlocale(LC_TIME, 'lt_LT.ISO-8859-13');

        Schema::defaultStringLength(191);
        view()->composer('layouts.sidebar', function($view) {

            $view->with('archives', \App\Post::archives());
            $view->with('navCategories', \App\Category::categories());
            $view->with('navPostTypes', \App\PostType::postTypes());
            $view->with('tags', \App\Tag::has('posts')->pluck('name'));

        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        setlocale(LC_TIME, config('app.locale'));
        //setlocale(LC_TIME, config('lt_LT'));
        setlocale(LC_TIME, 'lt_LT.ISO-8859-13');
        define('CHARSET', 'ISO-8859-13');
        //\Carbon\Carbon::setUtf8(false);

    }
}
