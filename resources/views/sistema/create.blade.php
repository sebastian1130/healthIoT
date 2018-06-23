@extends('layouts.app')
@section('content')
<p class="lead">.</p>
<hr>
@if($errors->any())
  <div class="alert alert-danger">
      @foreach($errors->all() as $error)
          <p>{{ $error }}</p>
      @endforeach
  </div>
@endif
@if(Session::has('flash_message'))
  <div class="alert alert-info">
      <a class="close" data-dismiss="alert">×</a>
      <strong>Atención!</strong> {!!Session::get('flash_message')!!}
  </div>
@endif
<div class="contenedor">
  <h1>Agregar un nuevo sistema</h1>
  <p class="lead">Ingresa la información de tu sistema</p>
  <hr>
      {!! Form::open(['route' => 'sistemas.store']) !!}
  <div class="form-group">
      {!! Form::label('nombre', 'Nombre', ['class' => 'control-label']) !!}
      {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
      {!! Form::label('descripcion', 'Descripción', ['class' => 'control-label']) !!}
      {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
      {!! Form::label('identificacion', 'Identificación', ['class' => 'control-label']) !!}
      {!! Form::text('identificacion', null, ['class' => 'form-control']) !!}
      ¿Cuál es el objetivo principal de tu sistema?
      <select name="prioridad">
        <option value = "1">Solamente es para comprobar mi salud de vez en cuando</option>
        <option value = "5">Sufro de problemas cardiacos relacionados con la presión arterial</option>
        <option value = "3">Podría sufrir de problemas relacionados con la presión arterial</option>
      </select>


      <!-- <select name="user_id" style = "display:none">



      </select> -->
  </div>
  <?php

  ?>
  {!! Form::submit('Crear un nuevo sistema', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
</div> <!--.contenedor-->
@stop
