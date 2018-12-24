@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div id="app" class="register-box-body">
            <p class="login-box-msg">新增使用者</p>
            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group has-feedback">
                    <select name="type" v-model="type" class="form-control">
                        <option disabled selected value="">選擇使用者</option>
                        <option value="boss">老闆</option>
                        <option value="teacher">老師</option>
                    </select>
                </div>
                <template v-if="type == 'teacher'">
                    <div class="form-group has-feedback {{ $errors->has('company_license') ? 'has-error' : '' }}">
                        <select name="company_license" class="form-control">
                            @foreach ($companies as $company)
                                <option value="{{ $company->company_license }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('company_license'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_license') }}</strong>
                            </span>
                        @endif
                    </div>
                    {{-- <div class="form-group has-feedback {{ $errors->has('company_license') ? 'has-error' : '' }}">
                        <input type="text" name="company_license" class="form-control" value="{{ old('company_license') }}"
                               placeholder="請輸入公司驗證碼">
                        <span class="glyphicon glyphicon-list form-control-feedback"></span>
                        @if ($errors->has('company_license'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_license') }}</strong>
                            </span>
                        @endif
                    </div> --}}
                    
                </template>
                <div class="form-group has-feedback {{ $errors->has('account') ? 'has-error' : '' }}">
                    <input type="text" name="account" class="form-control" value="{{ old('account') }}"
                           placeholder="請輸入使用者帳號">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('account'))
                        <span class="help-block">
                            <strong>{{ $errors->first('account') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
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
                </div>
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                           placeholder="請輸入姓名">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('mobile_phone') ? 'has-error' : '' }}">
                    <input type="text" name="mobile_phone" class="form-control" value="{{ old('mobile_phone') }}"
                           placeholder="請輸入手機號碼">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    @if ($errors->has('mobile_phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile_phone') }}</strong>
                        </span>
                    @endif
                </div>
                {{-- <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div> --}}
                {{-- <div class="form-group has-feedback {{ $errors->has('avatar') ? 'has-error' : '' }}">
                    <input type="file" name="avatar" class="form-control" value="{{ old('avatar') }}">
                    <span class="glyphicon glyphicon-file form-control-feedback"></span>
                    @if ($errors->has('avatar'))
                        <span class="help-block">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                    @endif
                </div> --}}
                <div class="form-group has-feedback {{ $errors->has('avatar') ? 'has-error' : '' }}">
                    <label class="btn btn-primary btn-block btn-flat">
                        <input id="upload_img" name="avatar" style="display:none;" type="file" onchange="readURL(this)" targetID="avatar" accept="image/gif, image/jpeg, image/png" class="form-control" value="{{ old('company_logo') }}">
                        <i class="fa fa-photo"></i> 上傳個人圖像
                    </label>
                    <img id="avatar" src="#" style="display:block; margin:auto;">
                </div>
                
                <template v-if="type == 'boss'">
                    <div class="form-group has-feedback {{ $errors->has('company_license') ? 'has-error' : '' }}">
                        <input type="text" name="company_license" class="form-control" value="<?php echo uniqid(); ?>" 
                               placeholder=""  >
                        <span class="glyphicon glyphicon-list form-control-feedback"></span>
                        @if ($errors->has('company_license'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_license') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('company_name') ? 'has-error' : '' }}">
                        <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}"
                               placeholder="請輸入公司名稱">
                        <span class="glyphicon glyphicon-modal-window form-control-feedback"></span>
                        @if ($errors->has('company_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('company_phone') ? 'has-error' : '' }}">
                        <input type="text" name="company_phone" class="form-control" value="{{ old('company_phone') }}"
                               placeholder="請輸入公司電話">
                        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                        @if ($errors->has('company_phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('company_address') ? 'has-error' : '' }}">
                        <input type="text" name="company_address" class="form-control" value="{{ old('company_address') }}"
                               placeholder="請輸入公司地址">
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                        @if ($errors->has('company_address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('company_logo') ? 'has-error' : '' }}">
                        <label class="btn btn-primary btn-block btn-flat">
                            <input id="upload_img" name="company_logo" style="display:none;" type="file" onchange="readURL(this)" targetID="company_logo" accept="image/gif, image/jpeg, image/png" class="form-control" value="{{ old('company_logo') }}">
                            <i class="fa fa-photo"></i> 上傳公司LOGO
                        </label>
                        <img id="company_logo" src="#" style="display:block; margin:auto;">
                    </div>
                    {{-- <div class="form-group has-feedback {{ $errors->has('company_logo') ? 'has-error' : '' }}">
                        <input type="file" name="company_logo" class="form-control" value="{{ old('company_logo') }}">
                        <span class="glyphicon glyphicon-file form-control-feedback"></span>
                        @if ($errors->has('company_logo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_logo') }}</strong>
                            </span>
                        @endif
                    </div> --}}
                </template>
                    
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat" 
                >{{ trans('adminlte::adminlte.register') }}</button>
            </form>
            <div class="auth-links">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                   class="text-center">已有帳號</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
<script>
var app = new Vue({
    el: '#app',
    data: {
        type: <?php if(old('type')) { echo "'" . old('type') . "'"; }  else { echo 'null'; } ?>
    }
})
</script>
<script>
    function readURL(input){
      if(input.files && input.files[0]){
        var imageTagID = input.getAttribute("targetID");
        var reader = new FileReader();
        reader.onload = function (e) {
           var img = document.getElementById(imageTagID);
           img.setAttribute("src", e.target.result)           
        }          
        reader.readAsDataURL(input.files[0]);           
      }           
    }          
</script>
@stop
