<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharlieController extends Controller
{
     public function home(){
        return view('home');
    }
}
