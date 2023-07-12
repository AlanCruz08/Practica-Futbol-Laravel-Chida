<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class division extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nivel',
        'liga',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'equipos_divisions', 'division_id', 'equipo_id');
    }
}
