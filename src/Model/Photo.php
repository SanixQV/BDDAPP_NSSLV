<?php
namespace bddapp\Model;
use Illuminate\Database\Eloquent\Model;
use bddapp\Model\Annonce as Annonce;
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
        return $this->belongsTo('bddApp\Model\Annonce','idAn');
    }
}
