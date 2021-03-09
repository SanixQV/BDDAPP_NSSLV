<?php

 namespace bddapp\model;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'Character';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function company(){
        return $this->hasMany('\bddapp\model\Company','id');
    }
    public function platform(){
        return $this->hasMany('\bddapp\model\Platform','id');
    }
}