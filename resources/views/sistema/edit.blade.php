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
  <h1>Editar sistema</h1>
  <p class="lead">Modifica la información de tu sistema</p>
  <a href="{{ route('sistemas.show', $data->user_id) }}">Regresar a Sistemas.</a></p>
  <hr>
  {!! Form::model($data, [
      'method' => 'PUT',
      'route' => ['sistemas.update', $data->id]
  ]) !!}
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
      <p>La identificación es única y no debería ser modificada. En caso de error, comunicarse al <em><b>+57 315 752 47 59</b></em>, un técnico le atenderá con mucho gusto</p>
      <!-- <select name="user_id" style = "display:none">



      </select> -->
  </div>

  <?php

  ?>
  {!! Form::submit('Editar sistema', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
</div>
@stop
