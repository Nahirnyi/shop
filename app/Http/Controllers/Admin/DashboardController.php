<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
    	$user = User::find(Auth::user()->id);
    	return view('admin.dashboard', ['user' => $user]);
    }
}
