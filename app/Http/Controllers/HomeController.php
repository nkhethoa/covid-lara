<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response   = $this->getCovidData();
        $colors     = $this->continentByColor();
        return view('home', compact('response', 'colors'));
    }

    private function getCovidData()
    {
        return Http::get('http://covid-scrape.test/')->json();
    }

    private function continentByColor()
    {
        return [
            "Europe"            => "danger",
            "Asia"              => "success",
            "Africa"            => "info",
            "South America"     => "warning",
            "North America"     => "dark",
            "Australia/Oceania" => "primary",
        ];
    }

    
}
