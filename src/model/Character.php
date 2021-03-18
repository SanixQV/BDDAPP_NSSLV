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

    public function game(){
        return $this->belongsToMany('bddapp\Model\game','game2character','character_id','game_id');
    }

    public function FAgame(){
        return $this->belongsTo('bddapp\Model\game','first_appeared_in_game_id');
    }
}