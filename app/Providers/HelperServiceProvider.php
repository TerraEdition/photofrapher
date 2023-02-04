<?php

namespace App\Providers;

use App\View\Components\FormChangePassword;
use App\View\Components\RejectReasonBooking;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/UI.php';
        require_once app_path() . '/Helpers/Date.php';
        require_once app_path() . '/Helpers/Model.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('form-change-password', FormChangePassword::class);
        Blade::component('reject-reason-booking', RejectReasonBooking::class);
    }
}
