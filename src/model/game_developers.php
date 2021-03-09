<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class game_developers extends Model
{
    protected $table = 'game_developers';
    protected $primaryKey = ['game_id','comp_id'];
    public $timestamps = false;

}