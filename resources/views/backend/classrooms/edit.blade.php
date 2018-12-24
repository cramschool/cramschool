@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-info">
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('backend.classrooms.update', ['classroom' => $classroom->id]) }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {{ method_field('PUT') }}
            <div class="box-body">
                    {{-- <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input type="password" name="password" class="form-control"
                            placeholder="請輸入密碼">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="請再次輸入密碼">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div> --}}
                    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" name="name" class="form-control" value="{{ $classroom->name }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('teacher_id') ? 'has-error' : '' }}">
                            <div class="">
                                <select name="teacher_id" class="form-control">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->user_id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('teacher_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('teacher_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        @if ($errors->has('mobile_phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile_phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    {{-- <div class="form-group has-feedback {{ $errors->has('avatar') ? 'has-error' : '' }}">
                        <label class="btn btn-primary btn-block btn-flat">
                            <input id="upload_img" name="avatar" style="display:none;" type="file" onchange="readURL(this)" targetID="avatar" accept="image/gif, image/jpeg, image/png" class="form-control" value="{{ old('company_logo') }}">
                            <i class="fa fa-photo"></i> 上傳個人圖像
                        </label>
                        <img id="avatar" src="#" style="display:block; margin:auto;">
                    </div> --}}
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="pull-right">
                <a href="{{ route('backend.users.index') }}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info">Update</button>
                </div>
            </div>
            <!-- /.box-footer -->
            </form>
        </div>
        </div>
    </div>
@endsection