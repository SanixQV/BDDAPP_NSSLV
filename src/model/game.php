<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\QueueEntityResolver;

class game extends Model
{
    protected $table = 'game';
    protected $primaryKey ='id';
    public $timestamps = false;

    public function character(){
        return $this->belongsToMany('bddapp\Model\Character','game2character','game_id','character_id');
    }
    public function company(){
        return $this->belongsToMany('bddapp\Model\Company','game_developers','game_id','comp_id');
    }
    public function rating(){
        return $this->belongsToMany('bddapp\Model\game_rating','game2rating','game_id','rating_id');
    }
    public function genre(){
        return $this->belongsToMany('bddapp\Model\genre','game2genre','game_id','genre_id');
    }
    public function FACharacter(){
        return $this->hasMany('bddapp\Model\Character', 'first_appeared_in_game_id');
    }
}