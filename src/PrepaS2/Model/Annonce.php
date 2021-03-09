<?php

namespace wishlist\PrepaS2\model;

use Illuminate\Database\Eloquent\Model;
use wishlist\PrepaS2\Model\Photo as Photo;
use wishlist\PrepaS2\Model\Categorie as Categorie;
class Annonce extends Model
{
    protected $table = 'Annonces';
	protected $primaryKey = 'idAn';
	public $timestamps = false;
    /**
     * Get the photo for the Annonce.
     */

    public function photo()
    {
        return $this->hasMany('Photo');
    }
    /**
     * The roles that belong to the user.
     */

    public function Categorie()
    {
        return $this->belongsToMany('Categorie');
    }
}
