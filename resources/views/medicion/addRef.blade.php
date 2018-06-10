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
  <p class="lead">Ingresa los datos de referencia para este sistema</p>
  <hr>
      {!! Form::open(['route' => array('medicions.addData', $sis->id)]) !!}
  <div class="form-group">
      {!! Form::label('valorPS', 'Presión sistólica: ', ['class' => 'control-label']) !!}
      {!! Form::text('valorPS', null, ['class' => 'form-control']) !!}
      {!! Form::label('valorPD', 'Presión diastólica: ', ['class' => 'control-label']) !!}
      {!! Form::text('valorPD', null, ['class' => 'form-control']) !!}
      {!! Form::label('valorT', 'Temperatura: ', ['class' => 'control-label']) !!}
      {!! Form::text('valorT', null, ['class' => 'form-control']) !!}
  </div>
  <?php

  ?>
  {!! Form::submit('Crear una nueva medida de referencia para el sistema', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
</div> <!--.contenedor-->
@stop
