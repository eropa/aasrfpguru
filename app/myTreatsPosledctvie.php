<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class myTreatsPosledctvie extends Model
{
    // Название
    protected $fillable = ['NamePosledctvie'];
    // Получаем весь список из базы
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
    public function UpdateDateId($id,$names){
        DB::table('my_treats_posledctvies')
            ->where('id', $id)
            ->update(['NamePosledctvie' => $names]);
    }

    /**
     * @param $datas
     * Добовляем данные в таблицу
     */
    public function AddRecord($datas){
        $this::create(['NamePosledctvie' => $datas->input('sName')]);
    }
}
