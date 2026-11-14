<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jegy extends Model
{
    protected $table = 'jegy';
    public $timestamps = false;

    public function diak()
    {
        return $this->belongsTo(Diak::class, 'diakid');
    }

    public function targy()
    {
        return $this->belongsTo(Targy::class, 'targyid');
    }
}
