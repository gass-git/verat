<?php

namespace App\Http\Controllers;

use App\Models\Log;

class DashboardController extends Controller
{
    public function show()
    {

        $logs = Log::orderBy('id', 'DESC')->take(10)->get();
        $logs_count = Log::count();

        return view('layouts/dashboard', compact('logs', 'logs_count'));
    }
}
