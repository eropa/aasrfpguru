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

}
