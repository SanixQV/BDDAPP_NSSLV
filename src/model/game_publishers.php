<?php


namespace bddapp\model;


class game_publishers extends Model
{
    protected $table = 'game_publishers';
    protected $primaryKey = ['game_id','comp_id'];
    public $timestamps = false;

}