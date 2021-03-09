<?php
namespace wishlist\PrepaS2\model;
use Illuminate\Database\Eloquent\Model;
use wishlist\PrepaS2\Model\Annonce as Annonce;
class Photo extends Model
{
    protected $table = 'photo';
	protected $primaryKey = 'idPhoto';
	public $timestamps = false;
    /**
     * Get the Annonce that owns the photo.
     */
    public function Annonce()
    {
        return $this->belongsTo('Annonce');
    }
}
