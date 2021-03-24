<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function commentaires(){
        return $this->hasMany('bddapp\Model\commentaire','idUser');
    }
}