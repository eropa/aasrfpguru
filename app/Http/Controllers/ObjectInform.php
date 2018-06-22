<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjectInform extends Controller
{
    //список вывести
    public function indexAll(){
        return view('upanel.objectinform_list');
    }

    //Управление
    public function manStoikost($id){
        return view('upanel.objectinform_manager',['id'=>$id]);
    }

}

