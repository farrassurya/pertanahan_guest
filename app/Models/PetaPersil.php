<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaPersil extends Model
{
    use HasFactory;

    protected $table = 'peta_persil';
    protected $primaryKey = 'peta_id';

    protected $fillable = [
        'persil_id',
        'geojson',
        'panjang_m',
        'lebar_m',
    ];

    protected $casts = [
        'panjang_m' => 'decimal:2',
        'lebar_m' => 'decimal:2',
    ];

    // Relasi ke Persil
    public function persil()
    {
        return $this->belongsTo(Persil::class, 'persil_id', 'persil_id');
    }

    // Helper untuk mengambil media
    public function media()
    {
        return Media::where('ref_table', 'peta_persil')
            ->where('ref_id', $this->peta_id)
            ->get();
    }

    // Scope untuk filter berdasarkan persil_id
    public function scopeFilter($query, $filters)
    {
        if (isset($filters['persil_id']) && $filters['persil_id'] != '') {
            $query->where('persil_id', $filters['persil_id']);
        }

        return $query;
    }

    // Scope untuk search
    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->whereHas('persil', function ($q) use ($search) {
                $q->where('kode_persil', 'like', "%{$search}%")
                  ->orWhere('alamat_lahan', 'like', "%{$search}%");
            });
        }

        return $query;
    }

    // Helper untuk decode GeoJSON
    public function getGeoJsonData()
    {
        if ($this->geojson) {
            return json_decode($this->geojson, true);
        }
        return null;
    }

    // Helper untuk format luas (panjang x lebar)
    public function getLuas()
    {
        if ($this->panjang_m && $this->lebar_m) {
            return $this->panjang_m * $this->lebar_m;
        }
        return null;
    }
}
