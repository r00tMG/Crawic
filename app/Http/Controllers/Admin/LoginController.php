<?php

// app/Http/Controllers/Admin/LoginController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Add any custom logic or view data here if needed
        return view('admin.login');
    }
}
