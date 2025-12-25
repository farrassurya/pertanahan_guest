<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SengketaPersil extends Model
{
    protected $table = 'sengketa_persil';
    protected $primaryKey = 'sengketa_id';

    protected $fillable = [
        'persil_id',
        'pihak_1',
        'pihak_2',
        'kronologi',
        'status',
        'penyelesaian',
    ];

    /**
     * Relasi ke Persil
     */
    public function persil()
    {
        return $this->belongsTo(Persil::class, 'persil_id', 'persil_id');
    }

    /**
     * Relasi ke Media (file upload)
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'sengketa_id')
            ->where('ref_table', 'sengketa_persil')
            ->orderBy('sort_order');
    }

    /**
     * Scope untuk filter
     */
    public function scopeFilter($query, $request, $filterableColumns = [])
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
    public function scopeSearch($query, $keyword)
    {
        return $query->where(function ($q) use ($keyword) {
            $q->where('pihak_1', 'like', "%{$keyword}%")
              ->orWhere('pihak_2', 'like', "%{$keyword}%")
              ->orWhere('kronologi', 'like', "%{$keyword}%")
              ->orWhereHas('persil', function ($query) use ($keyword) {
                  $query->where('kode_persil', 'like', "%{$keyword}%");
              });
        });
    }
}
