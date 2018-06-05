<?php

namespace App\Http\Controllers;

use App\myTreatsIstochnik;
use Illuminate\Http\Request;

class TreatsController extends Controller
{

    // Главная страница источников
    public function index(){
        //Модель для получения источника
        $myIstochnik=new myTreatsIstochnik();
        //список источников
        $dataIstochniks=$myIstochnik->SelectAllRecord();
        //испок все угроз в базе
        return view('upanel.threats_list',['dataIstochniks'=>$dataIstochniks]);
    }

    // Список источников
    public function indexIstochnik(){
        //экземпляр класса на модель
        $myModel=new myTreatsIstochnik();
        $datas=$myModel->SelectAllRecord();
        // открываем вьющку на открытие
        return view('upanel.threats_istochniks_list',['datas'=>$datas]);
    }
    // Управление источников угроз
    public function manIstochnik($id){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new myTreatsIstochnik();
        // открываем вьюшку на упрвление
        if($id==0){
            return view('upanel.threats_istochniks_manager',['id'=>$id]);
        }else{
            $datas=$myModel->SelectId($id);
            return view('upanel.threats_istochniks_manager',['id'=>$id,'datas'=>$datas]);
        }

    }

    /**
     * @param $id номер записи
     * Удоляем данные
     */
    public function deleteIstochnik($id){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new myTreatsIstochnik();
        //удоляем по номеру ID
        $myModel->DeleteRecord($id);
        // переходим на список всех групп
        return redirect('usp/treatsistochniklist');
    }

    //Создаем или сохроняем данные
    public function SaveUpdateIstochnik(Request $request){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new myTreatsIstochnik();
        // выполняем данные
        if($request->input('_idRecord')==0){
            $myModel->AddRecord($request);
        }else{
            $myModel->UpdateDateId($request->input('_idRecord'),$request->input('sName'));
        }
        // переходим на список всех групп
        return redirect('usp/treatsistochniklist');
    }
}
