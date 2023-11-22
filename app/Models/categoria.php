<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    const ACTIVO = 1;
    const INACTIVO = 0;

    protected $fillable = [
        'nombre',
        'descripcion',
        'status',
        'url'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
    
}
