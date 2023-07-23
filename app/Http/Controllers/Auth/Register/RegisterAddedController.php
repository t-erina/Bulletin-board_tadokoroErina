<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterAddedController extends Controller
{
    public function added()
    {
        return view('auth.added');
    }
}
