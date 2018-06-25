<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\myTreats;

class myModelMath extends Model
{

    /**
     * Возврошаем массив угроз
     *
     * @return mixed
     */
    public function ThreatsArray(){
        // переменную которую будет возврошать
        $arrayResult=array();
        // модель для угрозы с угрозами
        $myModelThreats=new myTreats();
        // получаем  все угрозы
        $datas=$myModelThreats->SelectAllRecord();
        foreach($datas as $data){
            array_push($arrayResult, $data->id);
        }
        // возврошаем
        return $arrayResult;
    }

    public function SecuriteArray(){
        // переменную которую будет возврошать
        $arrayResult=array();
        // модель для угрозы с угрозами
        $myModelSec=new SecurityB();
        // получаем  все угрозы
        $datas=$myModelSec->SelectAllRecord();
        foreach($datas as $data){
            array_push($arrayResult, $data->id);
        }
        // возврошаем
        return $arrayResult;
    }

    /**
     * Получаем номер угрозы
     *
     * @param $id
     * @return mixed
     */
    public function NameThreats($id){
        // модуль для работы с угрозами
        $myModelTreahts=new myTreats();
        // получаем по номеру записи
        $data=$myModelTreahts->SelectId($id);
        // возврошаем данные
        return $data->NameTreats;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function NameObject($id){
        // модуль для работы с угрозами
        $myModelObject=new myObjectInform();
        // получаем по номеру записи
        $data=$myModelObject->SelectId($id);
        // возврошаем данные
        return $data->sName;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function NameSecurite($id){
        // модуль для работы с угрозами
        $myModelSecurityB=new SecurityB();
        // получаем по номеру записи
        $data=$myModelSecurityB->SelectId($id);
        // возврошаем данные
        return $data->sName;
    }



}
