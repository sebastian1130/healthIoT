@extends('layouts.app')

@section('content')

<div class="contenedor">
  <h1>{{ $data->name }} {{ $data->apellidos }}</h1>
  <p class="lead">Usuario</p>

  <table class="table table-striped table-hover">

  <tr>
      <td style="width: 200px;">Email</td>
      <td>{{ $data->email }}</td>
  </tr>
  <tr>
      <td>Identificación</td>
      <td>{{ $data->identificacion }}</td>
  </tr>
  <tr>
      <td>Rol</td>
      <td>{{ $data->rol }}</td>
  </tr>

  <tr>
      <td>Created At</td>
      <td>{{ $data->created_at }}</td>
  </tr>
  <tr>
      <td>Updated At</td>
      <td>{{ $data->updated_at }}</td>
  </tr>
  </table>
  <hr>
  <div class="botones">
    <a href="{{ route('users.edit', $data->id) }}" class="btn btn-primary">Editar usuario</a>

    {!! Form::open([
        'method' => 'DELETE',
        'route' => ['users.destroy', $data->id]
    ]) !!}

    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger delete2']) !!}
    {!! Form::close() !!}

    <a href="{{ route('users.index') }}" class="btn btn-info">Volver a todos los usuarios</a>
  </div>

</div> <!--.contenedor-->



@stop
