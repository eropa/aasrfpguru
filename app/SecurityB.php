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

        DB::table('security_bs')
            ->where('id', $datas->input('_idRecord'))
            ->update([  'sName'             => $datas->input('sName'),
                        'typeIsctochnik'    => $sTypeIstochnuk,
                        'AboutSecurity'     => $datas->input('AboutText')
            ]);
    }

    public function SelectTreatsType($data){
        //получаем массив источников
        $SelectIsctochnik = explode("#", $data->typeIsctochnik);
        // строка запроса
        $datasReturn = DB::select('select * from my_treats');
        // возрошаем список
        return $datasReturn;
    }

    public function SelectStoicost(){
        // строка запроса
        $datasReturn = DB::select('select * from my_stoikosts');
        // возрошаем список
        return $datasReturn;
    }

}
