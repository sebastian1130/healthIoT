@extends('layouts.app')
@section('content')

<div class="contenedor">
  <a href="{{ url('adminPages/adminWelcome') }}" class="btn btn-primary">Volver</a>

  <h3>{{ $list->name }} {{ $list->apellidos }}</h3>
  <p>{{ $list->identificacion }}</p>
  <p>{{ $list->email }}</p>

</div> <!--.data-->
<hr>

@foreach($system as $sis)
  <div class="clearfix contenedor">
    <div class="data">
      <h3>Nombre: {{ $sis->nombre }}</h3>
      <p>Identificación: {{ $sis->identificacion }}</p>
      <p>Descripción: {{ $sis->descripcion }}</p>
      <p>Prioridad: {{ $sis->prioridad }}</p>
    </div> <!--.contenedor3-->
    <div class="">
      <div class="options">
        <p>
        <a href="{{ route('sistemas.edit', $sis->id) }}" class="btn btn-primary">Editar sistema</a>
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['sistemas.destroy', $sis->id]
        ]) !!}
        {!! Form::submit('Eliminar sistema', ['class' => 'btn btn-danger delete']) !!}
        {!! Form::close() !!}
        </p>
      </div> <!--.options-->
    </div> <!--.contenedor3-->
  </div>
  <hr>
  @endforeach

@stop
