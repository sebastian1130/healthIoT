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
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Regístrate</div>

                <div class="panel-body contenedor">
                    <form class="form-horizontal forma1" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="apellidos" class="col-md-4 control-label">Apellidos</label>
                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" >
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="edad" class="col-md-4 control-label">Edad</label>
                            <div class="col-md-6">
                                <input id="edad" type="text" class="form-control" name="edad" >
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="identificacion" class="col-md-4 control-label">Identificación</label>
                            <div class="col-md-6">
                                <input id="identificacion" type="text" class="form-control" name="identificacion" >
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
