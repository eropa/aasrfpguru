<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class myTreats extends Model
{
    //Поля доступные для записи
    protected $fillable = [
        'NameTreats',
        'TypeIstochnik',
        'Posledctvies',
        'userCreate',
        'AboutText'
    ];

    public function AddRecord($datas,$idUser){
        // Перечень типос источников угроз
        $sTypeIstochnuk='';
        foreach ($datas->input('mIstochnik') as $elementIstochnik){
            $sTypeIstochnuk=$sTypeIstochnuk." # ".$elementIstochnik;
        }
        // Перечень типом последствия
        $sPosledctvies='';
        foreach ($datas->input('mPosledctive') as $elementPosledctvie){
            $sPosledctvies=$sPosledctvies." # ".$elementPosledctvie;
        }
        // создаем запись в базе
        $this::create([ 'NameTreats'    =>  $datas->input('sName'),
                        'TypeIstochnik' =>  $sTypeIstochnuk,
                        'Posledctvies'  =>  $sPosledctvies,
                        'userCreate'    =>  $idUser,
                        'AboutText'     =>  $datas->input('AboutTreats')]);
    }

    /**
     * Получаем весь список из базы
     */
    public function SelectAllRecord(){
        return $this::all();
    }

    /**
     * @param $id  - номер записи
     * Удоляем запись
     */
    public function DeleteRecord($id){
        $this::destroy($id);
    }

    /**
     * @param $id по номеру записи
     * @return Возврошаем данные по номеру записи
     */
    public function SelectId($id){
        return $this::find($id);
    }
    //обновляем данные
    public function UpdateDateId($id,$datas){
        // Перечень типос источников угроз
        $sTypeIstochnuk='';
        foreach ($datas->input('mIstochnik') as $elementIstochnik){
            $sTypeIstochnuk=$sTypeIstochnuk." # ".$elementIstochnik;
        }
        // Перечень типом последствия
        $sPosledctvies='';
        foreach ($datas->input('mPosledctive') as $elementPosledctvie){
            $sPosledctvies=$sPosledctvies." # ".$elementPosledctvie;
        }
        DB::table('my_treats')
            ->where('id', $id)
            ->update([  'NameTreats'    => $datas->input('sName'),
                        'TypeIstochnik' =>  $sTypeIstochnuk,
                        'Posledctvies'  =>  $sPosledctvies,
                        'AboutText'     =>  $datas->input('AboutTreats')
        ]);
    }
}
