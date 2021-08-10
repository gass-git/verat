<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\UniqueVisit;
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
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $IP = request()->ip();

        // New ip?
        if( UniqueVisit::where('ip', $IP)->first() == null ){

            UniqueVisit::insert([
                'ip' => $IP, 
                'created_at' => Carbon::now()
            ]);
        }

        $visits = UniqueVisit::count();

        return view('layouts/home', compact('visits'));
    }
}
