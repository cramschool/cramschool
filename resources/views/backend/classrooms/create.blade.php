@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('backend.classrooms.store') }}" method="post" enctype="multipart/form-data">
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
            <div class="form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
              <label class="col-sm-2 control-label">company_id</label>
              <div class="col-sm-10">
                <input class="form-control" name="company_id" placeholder="company_id">
                @if ($errors->has('company_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_id') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('teacher_id') ? 'has-error' : '' }}">
              <label class="col-sm-2 control-label">teacher_id</label>
              <div class="col-sm-10">
                  <select name="teacher_id" class="form-control">
                      @foreach ($teachers as $teacher)
                          <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                      @endforeach
                  </select>
                @if ($errors->has('teacher_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('teacher_id') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
			<div class="pull-right">
              <a href="{{ route('backend.classrooms.index') }}" type="submit" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-info">Create</button>
			</div>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>
  </div>
@endsection