<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class estadio extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nombre',
        'pais',
        'capacidad',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'estadio_id');
    }

}
