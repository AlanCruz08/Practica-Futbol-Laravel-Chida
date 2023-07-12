<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class futbolista extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'nombre',
        'ap_paterno',
        'ap_materno',
        'alias',
        'no_camiseta',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'equipos_futbolistas', 'futbolista_id', 'equipo_id');
    }
}
