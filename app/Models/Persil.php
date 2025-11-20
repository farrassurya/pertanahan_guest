<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Persil extends Model
{
    protected $table = 'persil';
    protected $primaryKey = 'persil_id';
    protected $fillable = [
        'kode_persil', 'pemilik_warga_id', 'luas_m2', 'penggunaan', 'alamat_lahan', 'rt', 'rw'
    ];

    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(Warga::class, 'pemilik_warga_id', 'warga_id');
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class, 'ref_id')->where('ref_table', 'persil');
    }
}
