@extends('adminlte::page')

@section('title', 'Agregar Producto')

@section('content_header')
    <h1>Agregar Producto</h1>
@stop

@section('content')
<form method="POST" action="{{ route('producto.store') }}"  method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-md-6">
                <select name="categoria_id" class="form-control" >
                    @if ($categorias)
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>No hay categorías disponibles</option>
                    @endif
                </select>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-input name="nombre" label="Nombre" type="text" placeholder="" label-class="text-lightblue"
                value="" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-input name="precio" label="Precio" type="text" placeholder="" label-class="text-lightblue"
                value="" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <input type="file" name="url" class="form control" id="url">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-input name="stock" label="stock" type="text" placeholder="" label-class="text-lightblue"
                value="" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-adminlte-input name="descripcion" label="Descripcion" type="text" placeholder=""
                label-class="text-lightblue" value="" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-input name="disponibilida" label="Disponibilida" type="text" placeholder=""
                label-class="text-lightblue" value="" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mt-2">
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
            <a href="{{ route('producto.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>
  
@stop