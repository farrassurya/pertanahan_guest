<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class JenisPenggunaan extends Model
{
    use HasFactory;

    protected $table = 'jenis_penggunaan';

    protected $fillable = [
        'nama_penggunaan',
        'keterangan'
    ];
    protected $guarded = ['id'];

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
     * Scope untuk searchable column
     */
    public function scopeSearch(Builder $query, $search): Builder
    {
        return $query->where('nama_penggunaan', 'LIKE', '%' . $search . '%');
    }
}
