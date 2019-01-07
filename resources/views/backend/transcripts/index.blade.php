@extends('adminlte::page')
@section('content')
    <div id="app" class="row">
        <div class="col-xs-12">
        @if (session('status'))
            <div class="callout callout-info">
            <p>{{ session('status') }}</p>
            </div>
        @endif
        <form action="/backend/transcripts/import" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
          <div class="input-group input-group-sm" style="width: 150px;">
            <input name="transcript-file" type="file" class="form-control">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default">上傳</button>
            </div>
          </div>
        </form>
        <div class="box">
            <div class="box-header">
            <a href="{{ route('backend.transcripts.create') }}" class="btn btn-info">Add</a>

            <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">


                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
                </div>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                <th>ID</th>
                <th>student_name</th>
                <th>classroom_name</th>
                <th>subject</th>
                <th>score</th>
                <th>create_time</th>
                </tr>
                @foreach ($transcripts as $transcript)
                <tr>
                    <th>{{ $transcript->id }}</th>
                    <th>{{ $transcript->student_id }}</th>
                    <th>{{ $transcript->classroom_id }}</th>
                    <th>{{ $transcript->subject }}</th>
                    <th>{{ $transcript->score }}</th>
                    <th>{{ $transcript->created_at }}</th>
                    <th>
                    <a href="{{ route('backend.transcripts.edit', ['transcript' => $transcript->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('backend.transcripts.destroy', ['transcript' => $transcript->id]) }}" method="POST" class="d-inline-block">
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
