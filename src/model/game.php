<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    protected $table = 'game';
    protected $primaryKey ='id';
    public $timestamps = false;

}