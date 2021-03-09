<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class game2Platform extends Model
{
    protected $table = 'game2Platform';
    protected $primaryKey = ['game_id','platform_id'];
    public $timestamps = false;

}