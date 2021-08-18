<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(){

        $logs = Log::orderBy('id','DESC')->take(10)->get();

        return view('layouts/dashboard', compact('logs'));

    }
}
