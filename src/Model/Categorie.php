<?php

namespace bddapp\Model;

use Illuminate\Database\Eloquent\Model;

use bddapp\Model\Annonce as Annonce;

class Categorie extends Model
{
    protected $table = 'Categorie';
	protected $primaryKey = 'idCat';
	public $timestamps = false;
    /**
     * Get the photo for the Annonce.
     */

    public function Annonce()
    {
        return $this->belongsToMany('bddapp\Model\Annonce', 'appartenanceCategorieAnnonce', 'idAn', 'idCat');
    }
    
}
