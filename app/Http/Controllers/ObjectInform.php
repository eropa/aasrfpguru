<?php

namespace App\Http\Controllers;

use App\myObjectInform;
use Illuminate\Http\Request;

use App\SecurityB;
use App\myTreats;
use App\myTreatsIstochnik;
use App\myTreatsPosledctvie;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth; // <-- add this

class ObjectInform extends Controller
{
    //список вывести
    public function indexAll(){
        //источник
        $myModel= new myObjectInform();
        //добовляем данные
        $datas=$myModel->SelectAllRecord();
        // возврошаем вьюшку
        return view('upanel.objectinform_list',['datas'=>$datas]);
    }

    //Управление
    public function manObjectInfo($id){
        //Модель для получения источника
        $myIstochnik=new myTreatsIstochnik();
        //список источников
        $dataIstochniks=$myIstochnik->SelectAllRecord();
        //dump($dataIstochniks);
        //показываем вьюшку
        if($id==0) {
            //открываем форму для добавления
            return view('upanel.objectinform_manager', ['id' => $id, 'dataIstochniks' => $dataIstochniks]);
        }else{
            $myModel=new myObjectInform();
            //получаем данные по номеру
            $dataRecord=$myModel->SelectId($id);
            // разбивает в строку
            $SelectIsctochnik = explode("#", $dataRecord->sIstochnik);
            // открываем форму
            return view('upanel.objectinform_manager', ['id' => $id,
                                                        'dataIstochniks' => $dataIstochniks,
                                                        'SelectIsctochnik'  =>  $SelectIsctochnik,
                                                        'datas'=>$dataRecord]);
        }
    }


    //сохроняем данные или обновляем
    public function AddUpdatObject(Request $request){
        //источник
        $myModel= new myObjectInform();
        //добовляем данные
        $myModel->InsertRecord($request);
        //редирект
        return redirect('/usp/objinfolist');
        //dump($request);
    }

    /**
     * @param $id номер записи
     * Удоляем данные
     */
    public function deleteRecord($id){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new myObjectInform();
        //удоляем по номеру ID
        $myModel->DeleteRecord($id);
        // переходим на список всех групп
        return redirect('/usp/objinfolist');
    }

}

