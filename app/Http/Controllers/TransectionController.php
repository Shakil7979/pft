<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransectionController extends Controller
{
    public function show(Request $request ){
        return view('transection');
    } 
}
