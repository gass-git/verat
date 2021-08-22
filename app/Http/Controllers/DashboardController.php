<?php

namespace App\Http\Controllers;

use App\Models\Log;

class DashboardController extends Controller
{
    public function show(){

        $logs = Log::orderBy('id','DESC')->take(10)->get();

        return view('layouts/dashboard', compact('logs'));

    }
}
