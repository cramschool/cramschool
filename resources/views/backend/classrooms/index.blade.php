@extends('adminlte::page')
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
          <a href="{{ route('backend.classrooms.create') }}" class="btn btn-info">Add</a>

          {{-- <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div> --}}
        </div>
        <!-- /.box-header -->
        
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>Company_id</th>
              <th>teacher_id</th>
              <th>Name</th>
            </tr>
            @foreach ($classrooms as $classroom)
              <tr>
                <th>{{ $classroom->id }}</th>
                <th>{{ $classroom->company->name }}</th>
                <th>{{ $classroom->teacher ? $classroom->teacher->name : '' }}</th>
                <th>{{ $classroom->name }}</th>
                <th>
                  <a href="{{ route('backend.classrooms.edit', ['classroom' => $classroom->id]) }}" class="btn btn-primary">Edit</a>
                  <form action="{{ route('backend.classrooms.destroy', ['classroom' => $classroom->id]) }}" method="POST" class="d-inline-block">
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