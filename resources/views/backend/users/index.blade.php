@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Users List</h1>
@endsection

@section('content')
  <div id="app" class="row">
    <div class="col-xs-12">
      @if (session('status'))
        <div class="callout callout-info">
          <p>{{ session('status') }}</p>
        </div>
      @endif
      <div class="box">
        <div class="box-header">
          <a href="{{ route('backend.users.create') }}" class="btn btn-info">Add</a>

          <div class="box-tools">
            <form action="">
              {!! csrf_field() !!}
              <div class="form-group has-feedback">
                  <select name="type" class="form-control">
                      <option disabled selected value="">使用者類型</option>
                      <option value="">所有</option>
                      <option value="company">老闆</option>
                      <option value="teacher">老師</option>
                  </select>
              </div>
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="keyword" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>company_license</th>
              <th>account</th>
              <th>name</th>
              <th>mobile phone</th>
              <th>operation</th>
            </tr>
            @foreach ($users as $user)
              <tr>
                <th>{{ $user->id }}</th>
                <th>{{ $user->company_license }}</th>
                <th>{{ $user->account }}</th>
                <th>{{ $user->name }}</th>
                <th>{{ $user->mobile_phone }}</th>
                <th>
                  <a href="{{ route('backend.users.edit', ['user' => $user->id]) }}" class="btn btn-primary">Edit</a>
                  <form action="{{ route('backend.users.destroy', ['user' => $user->id]) }}" method="POST" class="d-inline-block">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger" @click="confirmDelete">Delete</button>
                  </form>
                </th>
              </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
  <style>
    form {
      display: inline-block;
    }

    .box-tools > form {
      display: flex;
    }

    .box-tools .input-group {
      margin-left: 1rem;
    }
  </style>
@endsection

@section('js')
  <script>
    var app = new Vue({
      el: '#app',
      methods: {
        confirmDelete ($event) {
          var result = confirm('Delete User')
          if (!result) {
            $event.preventDefault()
          }
        }
      }
    })
  </script>
@endsection
