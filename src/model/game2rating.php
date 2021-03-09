<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class game2rating extends Model
{
    protected $table = 'game2rating';
    protected $primaryKey = ['game_id','rating_id'];
    public $timestamps = false;

}