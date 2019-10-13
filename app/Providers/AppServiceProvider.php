<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 追加
// use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //file_existsの登録
    //     Blade::if('file_exists', function ($path) {
    //     return "<?php file_exists($path);
    }
}
