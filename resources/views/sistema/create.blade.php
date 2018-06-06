@extends('layouts.app')
@section('content')
@if($errors->any())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  </div>
@endif
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


    <!-- <select name="user_id" style = "display:none">



    </select> -->
</div>
<?php

?>
{!! Form::submit('Crear un nuevo sistema', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@stop
