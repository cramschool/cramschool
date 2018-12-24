@extends('adminlte::page')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">公司資料維護</h3>
        </div>
        @if (isset($status))
          <div class="row">
              <div class="col-md-12">
                <div class="box box-default">
                  <div class="box-header with-border">
                    <i class="fa fa-bullhorn"></i>
                    <h3 class="box-title">提醒</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    
                    <div class="callout callout-success">
                        
                        <div>
                        <p>{{$status}}</p>
                        </div>
                        
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
          </div>
        @endif
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="/backend/companies/edit" enctype="multipart/form-data"> 
          {{ csrf_field()}}
          <div class="box-body">
              <div class="form-group has-feedback {{ $errors->has('company_name') ? 'has-error' : '' }}">
                  <input type="text" name="company_name" class="form-control" value="{{ $company->name }}"
                         placeholder="company_name">
                  <span class="glyphicon glyphicon-list form-control-feedback"></span>
                  @if ($errors->has('company_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('company_name') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('company_phone') ? 'has-error' : '' }}">
                  <input type="number" name="company_phone" class="form-control" value="{{ $company->phone }}"
                         placeholder="company_phone">
                  <span class="glyphicon glyphicon-list form-control-feedback"></span>
                  @if ($errors->has('company_phone'))
                      <span class="help-block">
                          <strong>{{ $errors->first('company_phone') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('company_slogan') ? 'has-error' : '' }}">
                  <input type="text" name="company_slogan" class="form-control" value="{{ $company->slogan }}"
                         placeholder="company_slogan">
                  <span class="glyphicon glyphicon-list form-control-feedback"></span>
                  @if ($errors->has('company_slogan'))
                      <span class="help-block">
                          <strong>{{ $errors->first('company_slogan') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('company_address') ? 'has-error' : '' }}">
                  <input type="text" name="company_address" class="form-control" value="{{ $company->address }}"
                         placeholder="company_address">
                  <span class="glyphicon glyphicon-list form-control-feedback"></span>
                  @if ($errors->has('company_address'))
                      <span class="help-block">
                          <strong>{{ $errors->first('company_address') }}</strong>
                      </span>
                  @endif
              </div>
            {{-- <div class="form-group">
              <label for="company_name">公司名稱</label>
              <input type="text" class="form-control" id="company_name" placeholder="company_name">
            </div>
            <div class="form-group">
              <label for="company_phone">公司電話</label>
              <input type="number" class="form-control" id="company_phone" placeholder="company_phone">
            </div> --}}
            {{-- <div class="form-group">
              <label for="company_slogan">公司標語</label>
              <input type="text" class="form-control" id="company_name" placeholder="company_name">
            </div>
            <div class="form-group">
              <label for="company_address">公司地址</label>
              <input type="text" class="form-control" id="company_name" placeholder="company_name">
            </div>
            <div class="form-group has-feedback {{ $errors->has('company_logo') ? 'has-error' : '' }}">
                <label class="btn btn-primary btn-block btn-flat">
                    <input id="upload_img" style="display:none;" type="file" onchange="readURL(this)" targetID="company_logo" accept="image/gif, image/jpeg, image/png" class="form-control" value="{{ old('company_logo') }}">
                    <i class="fa fa-photo"></i> 上傳公司LOGO
                </label>
                <img id="company_logo" src="#" style="display:block; margin:auto;">
            </div> --}}
            {{-- <div class="checkbox">
              <label>
                <input type="checkbox"> Check me out
              </label>
            </div> --}}
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-2"></div>
    <!--/.col (right) -->
</div>
<!-- /.row -->
@endsection
@section('js')
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
@endsection