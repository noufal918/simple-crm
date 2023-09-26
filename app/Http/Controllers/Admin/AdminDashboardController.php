<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    // Dashboard
    public function __invoke()
    {
        return view('admin.home');
    }
}
