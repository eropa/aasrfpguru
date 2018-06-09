<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
            $sPosledctvies=$sTypeIstochnuk." # ".$elementPosledctvie;
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
}
