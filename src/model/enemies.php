<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class enemies extends Model
{
    protected $table = 'enemies';
    protected $primaryKey = ['char1_id','char2_id'];
    public $timestamps = false;

}