<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('landing.home');
    }

    public function hotelView()
    {
        return view('landing.holiday-listing');
    }

    public function buslisting()
    {
        return view('landing.bus-listing');
    }

    public function buspayment()
    {
        return view('landing.bus-payment');
    }

    public function flightlisting()
    {
        return view('landing.flight-listing');
    }

    public function flightpayment()
    {
        return view('landing.flight-payment');
    }

    public function holidaydetail()
    {
        return view('landing.holiday-detail');
    }

    public function holidaylisting()
    {
        return view('landing.holiday-listing');
    }

    public function hoteldetail()
    {
        return view('landing.hotel-detail');
    }

    public function hotellisting()
    {
        return view('landing.hotel-listing');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function aboutus()
    {
        return view('landing.aboutus');
    }

    public function contact()
    {
        return view('landing.contact');
    }

    public function blog()
    {
        return view('landing.blog');
    }

    public function blogoverview()
    {
        return view('landing.blogoverview');
    }


}
