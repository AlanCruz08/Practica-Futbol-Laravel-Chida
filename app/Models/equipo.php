<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class equipo extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nombre',
        'dir_deportivo',
        'estadio_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function estadio()
    {
        return $this->belongsTo(Estadio::class, 'estadio_id');
    }
    
    // Relación con equipos_divisions
    public function divisiones()
    {
        return $this->belongsToMany(Division::class, 'equipos_divisions', 'equipo_id', 'division_id');
    }
    
    // Relación con equipos_futbolistas
    public function futbolistas()
    {
        return $this->belongsToMany(Futbolista::class, 'equipos_futbolistas', 'equipo_id', 'futbolista_id');
    }
}
