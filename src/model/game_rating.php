<?php
namespace bddapp\model;

class game_rating extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'game_rating';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function games(){
        return $this->belongsToMany('bddapp\Model\game','game2rating','rating_id','game_id');
    }

    public function rating_board(){
        return $this->belongsTo('bddapp\Model\rating_board','rating_board_id');
    }
}