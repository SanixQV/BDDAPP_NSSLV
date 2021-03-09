<?php
namespace bddapp\model;

class Company extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Company';
    protected $primaryKey = 'id';
    public $timestamps = false;

}