<?php

namespace App\Http\Controllers;

use App\myTreats;
use App\myTreatsIstochnik;
use App\myTreatsPosledctvie;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth; // <-- add this

class TreatsController extends Controller
{
    // Главная страница источников
    public function index(){
        //Модель для получения источника
        $myIstochnik=new myTreatsIstochnik();
        //список источников
        $dataIstochniks=$myIstochnik->SelectAllRecord();

        //Модель для получения последствия
        $myPoscledctvie=new myTreatsPosledctvie();
        //Список
        $dataPosledctvies=$myPoscledctvie->SelectAllRecord();

        //Модуль угроз
        $myTreats =new myTreats();
        //Список
        $dataTreats=$myTreats->SelectAllRecord();

        //испок все угроз в базе
        return view('upanel.threats_list',[
            'dataIstochniks'    =>  $dataIstochniks,
            'dataPosledctvies'  =>  $dataPosledctvies,
            'dataTreats'        =>  $dataTreats
        ]);
    }
    // Список источников
    public function indexIstochnik(){
        //экземпляр класса на модель
        $myModel=new myTreatsIstochnik();
        $datas=$myModel->SelectAllRecord();
        // открываем вьющку на открытие
        return view('upanel.threats_istochniks_list',['datas'=>$datas]);
    }

    // Список последствий от угроз
    public function indexPosledctvies(){
        $myModel=new myTreatsPosledctvie();
        $datas=$myModel->SelectAllRecord();
        // открываем вьющку на открытие
        return view('upanel.threats_posledctvies_list',['datas'=>$datas]);
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
    // Управление источников угроз
    public function manPosledctvie($id){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new myTreatsPosledctvie();
        // открываем вьюшку на упрвление
        if($id==0){
            return view('upanel.threats_posledctvies_manager',['id'=>$id]);
        }else{
            $datas=$myModel->SelectId($id);
            return view('upanel.threats_posledctvies_manager',['id'=>$id,'datas'=>$datas]);
        }
    }
    // Управление угроз
    public function manTreats($id){

        //Модель для получения источника
        $myIstochnik=new myTreatsIstochnik();
        //список источников
        $dataIstochniks=$myIstochnik->SelectAllRecord();

        //Модель для получения последствия
        $myPoscledctvie=new myTreatsPosledctvie();
        //Список
        $dataPosledctvies=$myPoscledctvie->SelectAllRecord();



        // открываем вьюшку на упрвление
        if($id==0){
            return view('upanel.threats_manager',['id'=>$id,
                    'dataIstochniks'    =>  $dataIstochniks,
                    'dataPosledctvies'  =>  $dataPosledctvies
                    ]);
        }else{
            $myModel=new myTreats();
            $datas=$myModel->SelectId($id);
            $SelectIsctochnik = explode("#", $datas->TypeIstochnik);
            $SelectPosledctvie = explode("#", $datas->Posledctvies);
            //dump($SelectPosledctvie);

            return view('upanel.threats_manager',['id'=>$id,
                'dataIstochniks'    =>  $dataIstochniks,
                'dataPosledctvies'  =>  $dataPosledctvies,
                'datas'             =>  $datas,
                'SelectIsctochnik'  =>  $SelectIsctochnik,
                'SelectPosledctvie' =>  $SelectPosledctvie
            ]);

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

    /**
     * @param $id номер записи
     * Удоляем данные
     */
    public function deleteTreats($id){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new myTreats();
        //удоляем по номеру ID
        $myModel->DeleteRecord($id);
        // переходим на список всех групп
        return redirect('usp/treatslist');
    }

    /**
     * @param $id номер записи
     * Удоляем данные
     */
    public function deletePosledctvie($id){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new myTreatsPosledctvie();
        //удоляем по номеру ID
        $myModel->DeleteRecord($id);
        // переходим на список всех групп
        return redirect('usp/treatsposledctvies');
    }
    //Создаем или сохроняем данные (ИСТОЧНИК УГРОЗ)
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

    //Создаем или сохроняем данные (ПОСЛЕДСТВИИ)
    public function SaveUpdatePosledctvie(Request $request){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new myTreatsPosledctvie();
        // выполняем данные
        if($request->input('_idRecord')==0){
            $myModel->AddRecord($request);
        }else{
            $myModel->UpdateDateId($request->input('_idRecord'),$request->input('sName'));
        }
        // переходим на список всех групп
        return redirect('usp/treatsposledctvies');
    }

    //Создаем или сохроняем данные (УГРОЗЫ)
    public function SaveUpdateTreats(Request $request){
        // Экзепляр класса модели ИСТОЧНИК УГРОЗ
        $myModel=new myTreats();
        $idUser=Auth::user()->id;
        // выполняем данные
        if($request->input('_idRecord')==0){
            //добовляем данные
            $myModel->AddRecord($request,$idUser);
        }
        else{
            //обновляем данные
            $myModel->UpdateDateId($request->input('_idRecord'),$request);
        }
        // переходим на список всех групп
        return redirect('usp/treatslist');

    }
}
