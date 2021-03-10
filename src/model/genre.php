<?php
namespace bddapp\model;

class genre extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'genre';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function games(){
        return $this->belongsToMany('bddapp\Model\game','game2genre','genre_id','game_id');
    }
}