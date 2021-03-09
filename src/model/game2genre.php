<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class game2genre extends Model
{
    protected $table = 'game2genre';
    protected $primaryKey = ['game_id','genre_id'];
    public $timestamps = false;
}