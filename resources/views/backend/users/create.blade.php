@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Users</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('backend.users.store') }}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
          <div class="box-body">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input class="form-control" name="name" placeholder="Name">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
              <label class="col-sm-2 control-label">Phone</label>
              <div class="col-sm-10">
                <input class="form-control" name="phone" placeholder="Phone">
                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
              <label class="col-sm-2 control-label">Avatar</label>
              <div class="col-sm-10">
                <input type="file" name="avatar" class="form-control" placeholder="Avatar">
                @if ($errors->has('avatar'))
                    <span class="help-block">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
              <label class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
              <label class="col-sm-2 control-label">Password confirmation</label>
              <div class="col-sm-10">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password confirmation">
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
			<div class="pull-right">
              <a href="{{ route('backend.users.index') }}" type="submit" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-info">Create</button>
			</div>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
