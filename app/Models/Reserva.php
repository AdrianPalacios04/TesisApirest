<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
            'salones_id', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function services()
    {
        return $this->belongsToMany(Servicio::class, 'reservas_servicios');
    }
    public function salones()
    {
        return $this->belongsTo(Salones::class);
    }
}
