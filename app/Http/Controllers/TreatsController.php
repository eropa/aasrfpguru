<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TreatsController extends Controller
{

    // Главная страница источников
    public function index(){
        //испок все угроз в базе
        return view('upanel.threats_list');
    }

    // Список источников
    public function indexIstochnik(){
        // открываем вьющку на открытие
        return view('upanel.threats_istochniks_list');
    }
    // Управление источников угроз
    public function manIstochnik($id){
        // открываем вьюшку на упрвление
        return view('upanel.threats_istochniks_manager',['id'=>$id]);
    }
    public function SaveUpdateIstochnik(Request $request){
        dump($request);
    }
}
