<?php


namespace bddapp\model;


use Illuminate\Database\Eloquent\Model;

class commentaire extends model
{
    protected $table = 'commentaire';
    protected $primaryKey = 'idCom';
    public $timestamps = true;


    public function user(){
        return $this->belongsTo('bddapp\Model\user','id');
    }

    public function game(){
        return $this->belongsTo('bddapp\Model\game','idJeu');
    }
}