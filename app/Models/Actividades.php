<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    public function users() {
        return $this->belongsToMany(User::class, 'actividad_user');
    }
    protected $table = 'actividades';
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'hora',
        'lugar',
        'precio',
        'cupos',
        'imagen',
    ];

   public function posts()
    {
        return $this->hasMany(Post::class, 'actividades_id');
    }

    /**
     * CAMBIO AQUÍ: De hasMany a belongsToMany
     */
    /**
     * Relación con la tabla 'media' (fotos y vídeos)
     */
    public function media() {
        return $this->hasMany(\App\Models\Media::class, 'actividad_id');
    }

    /**
     * Genera un color consistente para una cadena de texto (nombre de actividad)
     */
    public static function generarColor($str) {
        $colores = ['#bc6a50', '#2d6a4f', '#1d3557', '#e63946', '#ffb703', '#8338ec', '#0077b6'];
        $hash = 0; 
        if (!$str) return $colores[0];
        for ($i = 0; $i < strlen($str); $i++) {
            $hash = ord($str[$i]) + (($hash << 5) - $hash);
        }
        return $colores[($hash & 0x7FFFFFFF) % count($colores)];
    }
}
