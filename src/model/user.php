<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'email';
    public $timestamps = true;


}