<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class myObjectInform extends Model
{

    //Поля доступные для записи
    protected $fillable = [
        'sName',
        'sAbout',
        'sIstochnik'
    ];


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

    //добовляем данные
    public function InsertRecord($datas){
        // Перечень типос источников угроз
        $sTypeIstochnuk='';
        foreach ($datas->input('mIstochnik') as $elementIstochnik){
            $sTypeIstochnuk=$sTypeIstochnuk." # ".$elementIstochnik;
        }
        // проверяем ( создать или изменить)
        if ($datas->input('_idRecord')==0){
            // создаем запись в базе
            $this::create([  'sName'        =>  $datas->input('sName'),
                             'sAbout'       =>  $datas->input('AboutText'),
                             'sIstochnik'   =>  $sTypeIstochnuk
            ]);
        }else{
            //обновляем данные
            DB::table('my_object_informs')
                ->where('id', $datas->input('_idRecord'))
                ->update([  'sName'    => $datas->input('sName'),
                    'sAbout' =>  $datas->input('AboutText'),
                    'sIstochnik'  =>  $sTypeIstochnuk
                ]);
        }
    }
}
