@extends('layouts.app')
@section('content')

<div class="contenedor">
  <h1>Editar usuario</h1>
  <p class="lead">Editar este usuario.
  <a href="{{ route('users.index') }}">Regresar a todos los usuarios.</a></p>
  <hr>

  @if($errors->any())
      <div class="alert alert-danger">
          @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
          @endforeach
      </div>
  @endif

  {!! Form::model($data, [
      'method' => 'PUT',
      'route' => ['users.update', $data->id]
  ]) !!}

  <div class="form-group">
      {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
      {!! Form::text('name', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
      {!! Form::label('apellidos', 'Apellido', ['class' => 'control-label']) !!}
      {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
      {!! Form::label('identificacion', 'Identificación', ['class' => 'control-label']) !!}
      {!! Form::text('identificacion', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
      {!! Form::label('rol', 'Rol', ['class' => 'control-label']) !!}
      {!! Form::select('rol', ['2' => 'Persona', '1' => 'Administrador','3' => 'Empresa', '4' => 'Médico']); !!}
  </div>
  <div class="form-group">
      {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
      {!! Form::text('email', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
      {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
      {!! Form::password('password', ['class' => 'form-control']) !!}
  </div>
      {!! Form::submit('Actualizar usuario', ['class' => 'btn btn-primary']) !!}
      {!! Form::close() !!}
</div>


@stop
