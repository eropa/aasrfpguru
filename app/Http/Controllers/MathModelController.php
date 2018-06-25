<?php

namespace App\Http\Controllers;

use App\myModelMath;
use App\myObjectInform;
use Illuminate\Http\Request;

class MathModelController extends Controller
{
    // старт моделирования
    public function index(){
        // экзепляр класса модуля для работы с объектами информации
        $myModelObj=new myObjectInform();
        // получаем все данные по защищаемым объектам
        $datas=$myModelObj->SelectAllRecord();
        // показываем вьющку
        return view('upanel.model_create',['datas'=>$datas]);
    }

    // анализурем
    public function MathAnaliz(Request $request){
        // строка для добавления
        $msgTable="";
        // номер вариант
        $iVar=1;


        // модуля для модулирования
        $myModelMath=new myModelMath();
        // список всех угроз
        $dataThreats=$myModelMath->ThreatsArray();
        // список всех средств защиты
        $dataSecurite=$myModelMath->SecuriteArray();
        //теперь анализурем со всеми средствами защиты

        // перебор всех вариантов барьеров
        for ($i=0;$i<count($dataSecurite);$i++){
            // выводим только один барьер
            $j = $i;
            // переменную которую будет возврошать
            while ($j < count($dataSecurite)) {
                $arraySec=array();
                //$a = $dataSecurite[$j];
                //echo $a ;
                for($k=$i;$k<count($dataSecurite);$k++){
                    if($k<>$j){
                       array_push($arraySec, $dataSecurite[$k]);
                    }
                }
                $j++;
                //Выводим данные по угрозам
                $resultsTreats = "<b>Угрозы-</b>";
                foreach($dataThreats as $dataThreat){
                    $resultsTreats=$resultsTreats."  ".$myModelMath->NameThreats($dataThreat)."<br>";
                }

                // выводим данные по элементам защиты
                $resultsarraySecs = "";
                foreach($arraySec as $element){
                    $resultsarraySecs=$resultsarraySecs." ".$myModelMath->NameSecurite($element)."<br>";
                }

                //выводим данные по защищаемым объектам
                $resultsObject = "<b>Защищаемые объекты-</b>";
                foreach($request->input('object') as $dataObject){
                    $resultsObject=$resultsObject." ".$myModelMath->NameObject($dataObject)."<br>";
                }

                $msgTable=$msgTable.
                            " <tr>
                                <td>
                                ".$iVar."
                                </td>
                                 <td>
                                ".$resultsarraySecs."
                                </td>
                                <td>
                                ".rand(1, 99)."  
                                </td>
                                <td>
                                 ".rand(250, 2399)."   USD
                                </td>
                            </tr>";
                $iVar++;
            }
        }
        // Выводим вьюшку
        return view('upanel.model_result',[ 'msgTable'=>$msgTable,
                                            'dataThreats'=>$resultsTreats,
                                            'dataObject'=>$resultsObject
                                            ]);
    }


}
