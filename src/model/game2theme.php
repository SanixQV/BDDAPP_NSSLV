<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class game2theme extends Model
{
    protected $table = 'game2theme';
    protected $primaryKey = ['game_id','theme_id'];
    public $timestamps = false;

}