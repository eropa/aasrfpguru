<?php

namespace App\Http\Controllers;

use App\SecurityB;
use Illuminate\Http\Request;
use App\myTreats;
use App\myTreatsIstochnik;
use App\myTreatsPosledctvie;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth; // <-- add this

class SecuritybController extends Controller
{
    //
    public function IndexAll(){
        //Модель для получения источника
        $myIstochnik=new myTreatsIstochnik();
        //список источников
        $dataIstochniks=$myIstochnik->SelectAllRecord();

        $myDatas=new SecurityB();
        $datas=$myDatas->SelectAllRecord();

        //показываем вьюшку
        return view('upanel.securiteb_list',[ 'dataIstochniks'    =>  $dataIstochniks,'dataSecurites'=>$datas]);
    }

    // Управление источников угроз
    public function manForm($id){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new myTreatsIstochnik();
        // CСписок всех источникво
        $datasIstohniks=$myModel->SelectAllRecord();
        // открываем вьюшку на упрвление
        if($id==0){
            return view('upanel.securiteb_manager',['id'=>$id,'datasIstohniks'=>$datasIstohniks]);
        }else{
            $securiteModel=new SecurityB();
            $datas=$securiteModel->SelectId($id);
            $SelectIsctochnik = explode("#", $datas->typeIsctochnik);
            return view('upanel.securiteb_manager',['id'=>$id,
                'datasIstohniks'=>$datasIstohniks,
                'datas'=>$datas,
                'SelectIsctochnik'=>$SelectIsctochnik]);
        }
    }


    //Создаем или сохроняем данные (ПОСЛЕДСТВИИ)
    public function SaveUpdateSecuriteb(Request $request){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new SecurityB();
        $idUser=Auth::user()->id;
        // выполняем данные
        if($request->input('_idRecord')==0){
            $myModel->AddRecord($request,$idUser);
        }else{
            $myModel->UpdateDateId($request);
        }
        // переходим на список всех групп
        return redirect('/usp/scuriteblist');
    }

    /**
     * @param $id номер записи
     * Удоляем данные
     */
    public function deleteRecord($id){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new SecurityB();
        //удоляем по номеру ID
        $myModel->DeleteRecord($id);
        // переходим на список всех групп
        return redirect('usp/scuriteblist');
    }

    //Покащываем страницу стойкости
    public function indexStoikost($id){
        // Экземпляр класса
        $securiteModel=new SecurityB();
        // получаем защиту
        $datas=$securiteModel->SelectId($id);
        // получаем все угрозы протик каких барьер может быть эфективный
        $threatsList = $securiteModel->SelectTreatsType($datas);
        // выводим вьюшку
        return view('upanel.securiteb_prochent',['id'=>$id,'datas'=>$datas,'threatsList'=>$threatsList]);
    }

}
