<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'name_service','price','grupo_id'
    ];
    use HasFactory;

    public function grupos()
    {
        return $this->belongsTo(Grupo::class);
    }
    public function reservation()
    {
        return $this->belongsToMany(Reserva::class);
    }
}
