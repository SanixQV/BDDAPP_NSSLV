<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class game2character extends Model
{
    protected $table = 'game2character';
    protected $primaryKey = ['game_id','character_id'];
    public $timestamps = false;

}