<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

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

    /**
     * Relasi ke DokumenPersil
     */
    public function dokumen(): HasMany
    {
        return $this->hasMany(DokumenPersil::class, 'persil_id', 'persil_id');
    }

    /**
     * Relasi ke PetaPersil
     */
    public function peta(): HasMany
    {
        return $this->hasMany(PetaPersil::class, 'persil_id', 'persil_id');
    }

    /**
     * Scope untuk filterable columns
     */
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    /**
     * Scope untuk searchable columns
     */
    public function scopeSearch(Builder $query, $search): Builder
    {
        return $query->where(function($q) use ($search) {
            $q->where('kode_persil', 'LIKE', '%' . $search . '%')
              ->orWhere('penggunaan', 'LIKE', '%' . $search . '%')
              ->orWhereHas('pemilik', function($q) use ($search) {
                  $q->where('nama', 'LIKE', '%' . $search . '%');
              });
        });
    }
}
