<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';



    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'menu_platos');
    }
}
