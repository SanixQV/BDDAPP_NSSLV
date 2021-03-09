<?php
namespace wishlist\PrepaS2\model;
use Illuminate\Database\Eloquent\Model;
use wishlist\PrepaS2\Model\Annonce as Annonce;
class Photo extends Model
{
    /**
     * Get the Annonce that owns the photo.
     */
    public function Annonce()
    {
        return $this->belongsTo('Annonce');
    }
}
