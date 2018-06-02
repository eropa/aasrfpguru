<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TreatsController extends Controller
{
    //
    public function index(){
        return view('upanel.threats_list');
    }
}
