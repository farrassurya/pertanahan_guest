<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'media_id';

    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_name',
        'caption',
        'mime_type',
        'sort_order'
    ];

    /**
     * Get full file path
     */
    public function getFilePathAttribute()
    {
        return storage_path('app/public/media/' . $this->file_name);
    }

    /**
     * Get file URL
     */
    public function getFileUrlAttribute()
    {
        return asset('storage/media/' . $this->file_name);
    }
}
