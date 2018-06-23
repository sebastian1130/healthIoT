@extends('layouts.app')


@section('content')

    <div class="indexTitle">
      <h1>Listado de usuarios</h1>
      <p class="lead">Lista de todos los usuarios registrados.
      <a href="{!! url('users/create') !!}"> ¿Desea agregar un nuevo usuario?</a></p>
    </div>
    <hr>
    @foreach($list as $user)
      <div class="clearfix contenedor">
        <div class="data">
          <h3>{{ $user->name }} {{ $user->apellidos }}</h3>
          <p>{{ $user->identificacion }}</p>
          Edad: <p><?php echo  $user->edad ; ?></p>
          <p>{{ $user->email }}</p>
          <p>Rol: <?php if($user->rol==1){echo "Administrador";}else if($user->rol == 2){echo "Persona";} ?></p>
        </div> <!--.data-->
        <div class="options">
          <p>
          <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Ver usuario</a>
          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar usuario</a>
          <a href="{{ route('sistemas.show', $user->id) }}" class="btn btn-primary">Ver sistemas</a>
          {!! Form::open([
              'method' => 'DELETE',
              'route' => ['users.destroy', $user->id]
          ]) !!}
          {!! Form::submit('Eliminar usuario', ['class' => 'btn btn-danger delete']) !!}
          {!! Form::close() !!}
          </p>
        </div> <!--.options-->
      </div> <!--.contenedor-->


        <hr>
    @endforeach
@stop
