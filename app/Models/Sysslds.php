<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sysslds extends Model
{
    //
    protected $table = 'sysslds';

    protected $fillable = [
        'pengguna',
        'stok_id',
        'device_id',
        'petak',
        'kuantiti',
        'institut_id',
        'created_at',
        'updated_at'
    ];

    public function stok()
    {
        return $this->belongsTo('App\Models\Stoks');
    }

    public function institut()
    {
        return $this->belongsTo('App\Models\Institut');
    }

    public function lokasistok()
    {
        return $this->belongsTo('App\Models\Lokasistoks');
    }

    public function device()
    {
        return $this->belongsTo('App\Models\Devices');
    }

}
