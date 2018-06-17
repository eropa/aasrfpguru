<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class myStoikost extends Model
{
    //
    public function index(){
        return view('upanel.stoukost')
    }
}
