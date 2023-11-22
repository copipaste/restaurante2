<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\promocion;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promociones = promocion::all();
        $heads = [
            'nombre',
            'descripcion',
            'porcentaje de descuento',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        return view('promocion.index',compact('heads','promociones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promocion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'procentajeDescuento' => 'required',
        ]); //validacion de los campos osea que tienen que tener algun valor 

        $promocion = promocion::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'procentajeDescuento' => $request->procentajeDescuento,
        ]); 
        $this->saveToLog($request,'store',$promocion);

        return redirect()->route('promocion.index', $promocion);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promocion = promocion::findOrFail($id);
        return view('promocion.show',compact('promocion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promocion = promocion::findOrFail($id);
        return view('promocion.edit',compact('promocion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'porcentaje_descuento' => 'required',
        ]); //validacion de los campos osea que tienen que tener algun valor 
        $promocion = promocion::findOrFail($id);
       
        $promocion->update($request->all());
        $this->saveToLog($request,'update',$promocion);

       return redirect()->route('promocion.index', $promocion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $promocion = promocion::find($id);
        $this->saveToLog($request,'destroy',$promocion);
        $promocion->delete();
        return redirect()->route('promocion.index', $promocion)->with('mensaje','registro eliminado correctamente');             
    }
}
