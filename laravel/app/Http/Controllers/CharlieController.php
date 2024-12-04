<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\View\Component;

class CharlieController extends Controller
{
     public function home(){

        return view('home');
    }

}
