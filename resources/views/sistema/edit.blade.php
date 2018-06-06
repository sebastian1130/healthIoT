@extends('layouts.app')
@section('content')
@if($errors->any())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
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
