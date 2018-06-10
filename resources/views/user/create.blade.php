<!-- /**TODAS LAS VISTAS TIENEN LA EXTENSIÓN .blade.php**/ -->
@extends('layouts.app')
@section('content')
  <!-- //Aqui queda todo el contenido -->
  <div class="contenedor">
    <h1>Añadir nuevo usuario</h1>
    <p class="lead">.</p>
    <hr>
    @if($errors->any())
      <div class="alert alert-danger">
          @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
          @endforeach
      </div>
    @endif


    {!! Form::open(['route' => 'users.store']) !!}
    <div class="form-group ">
      {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
      {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group ">
      {!! Form::label('apellidos', 'Apellido', ['class' => 'control-label']) !!}
      {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group ">
      {!! Form::label('identificacion', 'Identificación', ['class' => 'control-label']) !!}
      {!! Form::text('identificacion', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group ">
      {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
      {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group ">
      {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
      {!! Form::password('password', null, ['class' => 'form-control']) !!}
    </div>
      {!! Form::submit('Crear un nuevo usuario', ['class' => 'btn btnprimary']) !!}
      {!! Form::close() !!}
  </div> <!--.contenedor-->



@stop
