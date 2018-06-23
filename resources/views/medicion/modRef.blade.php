@extends('layouts.app')
@section('content')
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
  <p class="lead">Modifica los datos de referencia para este sistema</p>
  <hr>


      {!! Form::model($sis, [
          'method' => 'PUT',
          'route' => ['medicions.update', $sis->id]
      ]) !!}
  <div class="form-group">
      {!! Form::label('valorPS', 'Presión sistólica: ', ['class' => 'control-label']) !!}
      {!! Form::text('valorPS', null, ['class' => 'form-control']) !!}
      {!! Form::label('valorPD', 'Presión diastólica: ', ['class' => 'control-label']) !!}
      {!! Form::text('valorPD', null, ['class' => 'form-control']) !!}
      {!! Form::label('valorT', 'Temperatura: ', ['class' => 'control-label']) !!}
      {!! Form::text('valorT', null, ['class' => 'form-control']) !!}
  </div>
  <p>Los datos son completamente modificables, recordar que valores de referencia erróneos podría causar falsas alertas para los paciente, o no generar ninguna.</p>
  <?php

  ?>
  {!! Form::submit('Modifica las medidas de referencia para el sistema', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
</div> <!--.contenedor-->
@stop
