<?php

namespace bddapp\Model;;

use Illuminate\Database\Eloquent\Model;
use bddapp\Model\Photo as Photo;
use bddapp\Model\Categorie as Categorie;

class Annonce extends Model
{
    protected $table = 'Annonce';
	protected $primaryKey = 'idAn';
	public $timestamps = false;
    /**
     * Get the photo for the Annonce.
     */

    public function photo()
    {
        return $this->hasMany('bddapp\Model\Photo','idAn');
    }
    
    public function Annonce()
    {
        return $this->belongsToMany('bddapp\Model\Categorie', 'appartenanceCategorieAnnonce', 'idAn', 'idCat');
    }

}
