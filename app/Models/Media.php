<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'media_id';
    protected $fillable = [
        'ref_table', 'ref_id', 'file_url', 'caption', 'mime_type', 'sort_order'
    ];

    public function persil()
    {
        return $this->belongsTo(Persil::class, 'ref_id', 'persil_id')->where('ref_table', 'persil');
    }
}
