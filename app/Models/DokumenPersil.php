<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class DokumenPersil extends Model
{
    protected $table = 'dokumen_persil';
    protected $primaryKey = 'dokumen_id';

    protected $fillable = [
        'persil_id',
        'jenis_dokumen',
        'nomor',
        'keterangan'
    ];

    /**
     * Relasi ke Persil
     */
    public function persil(): BelongsTo
    {
        return $this->belongsTo(Persil::class, 'persil_id', 'persil_id');
    }

    /**
     * Relasi ke Media (polymorphic)
     */
    public function media()
    {
        return Media::where('ref_table', 'dokumen_persil')
                    ->where('ref_id', $this->dokumen_id)
                    ->get();
    }

    /**
     * Scope untuk filter berdasarkan kolom yang bisa difilter
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
     * Scope untuk search
     */
    public function scopeSearch(Builder $query, $search): Builder
    {
        return $query->where(function($q) use ($search) {
            $q->where('jenis_dokumen', 'LIKE', '%' . $search . '%')
              ->orWhere('nomor', 'LIKE', '%' . $search . '%')
              ->orWhere('keterangan', 'LIKE', '%' . $search . '%')
              ->orWhereHas('persil', function($q) use ($search) {
                  $q->where('kode_persil', 'LIKE', '%' . $search . '%');
              });
        });
    }
}
