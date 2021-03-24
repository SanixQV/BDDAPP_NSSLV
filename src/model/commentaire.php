<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class commentaire extends model
{
    protected $table = 'commentaire';
    protected $primaryKey = 'titre';
    public $timestamps = true;

}