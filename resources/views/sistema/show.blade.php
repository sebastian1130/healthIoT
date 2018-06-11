@extends('layouts.app')
@section('content')

<div class="contenedor">


  <h3>{{ $list->name }} {{ $list->apellidos }}</h3>
  <p>{{ $list->identificacion }}</p>
  <p>{{ $list->email }}</p>

</div> <!--.data-->
<hr>
@if($system->count()>0)
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
          <a href="{{ route('takens.show', $sis->id) }}" class="btn btn-primary">Ver medidas</a>
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
  @else
  <div class="contenedor">
    <p class="lead">No tienes nigún sistema,
    <a href="{!! url('sistemas/create') !!}"> ¿te gustaría crear uno?</a></p>
  </div>

  @endif

@stop
