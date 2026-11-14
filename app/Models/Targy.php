<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Targy extends Model
{
    protected $table = 'targy';
    public $timestamps = false;

    public function jegyek()
    {
        return $this->hasMany(Jegy::class, 'targyid');
    }
}
