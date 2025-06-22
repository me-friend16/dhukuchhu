<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirmController extends Controller
{
    public function dashboard()
    {
        return view('firm.dashboard');
    }

    public function userDashboard()
    {
        return view('firm.user_dashboard');
    }
}
