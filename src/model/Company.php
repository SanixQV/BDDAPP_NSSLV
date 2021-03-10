<?php
namespace bddapp\model;

class Company extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Company';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function game(){
        return $this->belongsToMany('bddapp\Model\game','game_developers','comp_id','game_id');
    }

}