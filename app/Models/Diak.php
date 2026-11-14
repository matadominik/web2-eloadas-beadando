<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diak extends Model
{
    protected $table = 'diak';
    public $timestamps = false;

    public function jegyek()
    {
        return $this->hasMany(Jegy::class, 'diakid');
    }
}
