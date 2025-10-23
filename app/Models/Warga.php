<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
        protected $table = 'warga';
    protected $primaryKey = 'id';

    public function persil()
    {
        return $this->hasMany(Persil::class, 'pemilik_warga_id', 'id');
    }
}
