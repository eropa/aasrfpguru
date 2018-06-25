<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SecurityB extends Model
{

    //Поля доступные для записи
    protected $fillable = [
        'sName',
        'typeIsctochnik',
        'AboutSecurity',
        'userCreate'
    ];

    //Добовляем новую запись
    public function AddRecord($datas,$idUser){
        // Перечень типос источников угроз
        $sTypeIstochnuk='';
        foreach ($datas->input('mIstochnik') as $elementIstochnik){
            $sTypeIstochnuk=$sTypeIstochnuk." # ".$elementIstochnik;
        }

        // создаем запись в базе
        $this::create([ 'sName'    =>  $datas->input('sName'),
            'typeIsctochnik' =>  $sTypeIstochnuk,
            'userCreate'    =>  $idUser,
            'price'         =>  (float)$datas->input('fPrice'),
            'AboutSecurity'  =>  $datas->input('AboutText')]);
    }

    /**
     * Получаем весь список из базы
     */
    public function SelectAllRecord(){
        return $this::all();
    }

    /**
     * @param $id по номеру записи
     * @return Возврошаем данные по номеру записи
     */
    public function SelectId($id){
        return $this::find($id);
    }

    /**
     * @param $id  - номер записи
     * Удоляем запись
     */
    public function DeleteRecord($id){
        $this::destroy($id);
    }

    //обновляем данные
    public function UpdateDateId($datas){
        // Перечень типос источников угроз
        $sTypeIstochnuk='';
        foreach ($datas->input('mIstochnik') as $elementIstochnik){
            $sTypeIstochnuk=$sTypeIstochnuk." # ".$elementIstochnik;
        }
        // обновляем данные в базе
        DB::table('security_bs')
            ->where('id', $datas->input('_idRecord'))
            ->update([  'sName'             => $datas->input('sName'),
                        'price'         => $datas->input('fPrice'),
                        'typeIsctochnik'    => $sTypeIstochnuk,
                        'AboutSecurity'     => $datas->input('AboutText')
            ]);
    }
    // Возрошаем угрозы против каких барьер защиты может работать
    public function SelectTreatsType($data){
        //получаем массив источников
        $SelectIsctochnik = explode("#", $data->typeIsctochnik);
        //удоляем пустой элемент
        unset ($SelectIsctochnik[0]) ;
        $filtrLike="";
        $iCount=0;
        // формируем строку для фильтра
        foreach($SelectIsctochnik as $elementist){
            // Если добовляем первый элемент то начинаем строку фильтра
            if ($iCount==0){
                $filtrLike="WHERE TypeIstochnik LIKE '%#_".(int)$elementist."'";
                $iCount=1;
            }else{
                //Доболвяем еще дополнитеьные источникик
                $filtrLike=$filtrLike."or TypeIstochnik LIKE '%#_".(int)$elementist."'";
            }
        }
        // строка запроса
        $datasReturn = DB::select('select * from my_treats '.$filtrLike);
        // возрошаем список
        return $datasReturn;
    }

    // возрошаем таблицу СТОЙКОСТИ
    public function SelectStoicost(){
        // строка запроса
        $datasReturn = DB::select('select * from my_stoikosts');
        // возрошаем список
        return $datasReturn;
    }

    // записываем значение Стойкости по определенноу барьеру защиты
    public function UpdateStoicost($datas){
        // удоляем данные
        DB::table('my_stoikosts')->where('idSecurity', '=', $datas->input('_idRecord'))->delete();
        //получаем массив источников
        $SelectIsctochnik = explode(" ", $datas->input('_idThreats'));
        //записываем данные в таблицу
        foreach($SelectIsctochnik as $data){
            //print $datas->input('stoikost_'.(int)$data);
            DB::table('my_stoikosts')->insert(
                 [      'idSecurity'    => $datas->input('_idRecord'),
                        'idTreats'      => (int)$data,
                        'StoukostP'     =>$datas->input('stoikost_'.(int)$data)]
            );
        }
    }
}
