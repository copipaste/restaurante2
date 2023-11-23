<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Menu;

class MenuController extends Controller
{
    function index()
    {
        $Products = Producto::all();
        return view('LandingPage.menus.index', compact('Products'));
    }


    function update(Request $request ,string $id){
        //  dd($request ,$id);
        //  aqui vienen los datos que se mandaran de el menu es decir si se selecciona algun producto    
        return redirect()->route('menus.index');
    }

    function main()
    {
        $comments = Comment::latest()->take(3)->with('user')->get(); 
        $menu = Menu::findOrfail(1);
        $specials = $menu->productos;

        if($comments->count() == 0){
        $comments = null;
        }
        if($specials->count() == 0){
        $specials = null;
        }

        return view('welcome', compact('comments', 'specials'));
    }

}
