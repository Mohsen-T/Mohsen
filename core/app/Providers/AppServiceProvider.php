<?php

namespace App\Providers;

use App\Models\General;
use Illuminate\Support\ServiceProvider;


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
        //
        $gnl = General::first();
        if($gnl == null)
        {
            $default = [
                'title' => 'Redsea Booking',
                'subtitle' => 'Subtitle',
                'startdate' => '2017-12-29',
                'color' => '009933',
                'cur' => 'BDT',
                'cursym' => 'TK',
                'decimal' => '2',
                'reg' => '1',
                'emailver' => '0',
                'smsver' => '1',
                'emailnotf' => '0',
                'smsnotf' => '1'
            ];
            General::create($default);
            $gnl = General::first();
        }
        view()->share('gnl',  $gnl);
    }
}
