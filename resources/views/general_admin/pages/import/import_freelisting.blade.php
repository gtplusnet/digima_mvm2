@extends('layout.general_layout')
@section('content')

<style>
    .green
    {
        color: green;
    }
    .red
    {
        color: red;
    }
    .custom-upload
    {
        width: 100%;
        height: 100px;
        border: black dashed 2px;
        background-color: white;
    }
    .dropzone
    {
        position: relative;
        border: dashed 3px #76b6ec;
        min-height: 100px;
        padding: 5px 15px;
        cursor: pointer;
    }
    .dropzone .dz-message *
    {
        text-align: center;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 0;
        right: 0;
        margin: auto;
    }
    .dropzone .dz-preview
    {
        position: initial;
    }
    .dropzone, .dropzone * {
  box-sizing: border-box; }

.dropzone 
{
  position: relative; 
}
  .dropzone .dz-preview 
  {
    position: relative;
    display: inline-block;
    width: 120px;
    margin: 0.5em; 
  }
    .dropzone .dz-preview .dz-progress 
    {
      display: block;
      height: 15px;
      border: 1px solid #aaa; 
    }
      .dropzone .dz-preview .dz-progress .dz-upload 
    {
        display: block;
        height: 100%;
        width: 0;
        background: green; 
    }
    .dropzone .dz-preview .dz-error-message 
    {
      color: red;
      display: none; 
    }
    .dropzone .dz-preview.dz-error .dz-error-message, .dropzone .dz-preview.dz-error .dz-error-mark 
    {
      display: block; 
    }
    .dropzone .dz-preview.dz-success .dz-success-mark 
    {
      display: block; }
    .dropzone .dz-preview .dz-error-mark, .dropzone .dz-preview .dz-success-mark 
    {
      position: absolute;
      display: none;
      left: 30px;
      top: 30px;
      width: 54px;
      height: 58px;
      left: 50%;
      margin-left: -27px; 
    }
</style>
<div class="page-title" style="margin-bottom:20px;">
    <form class="form-group">
            <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
    </form>
    <h3>Import Free Listing</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/general_admin/dashboard">Home</a></li>
            <li class="active">Import Free Listing</li>
        </ol>
    </div>
</div>
<div id="main-wrapper" style="text-align: right">
    <a href="/general_admin/merchants/import-download-freelist" class="btn btn-success" >Download Free Listing Template</a>

    <a href="/general_admin/merchants/import-export-error" class="btn btn-custom-white pull-right import-error hidden"></a>
</div>
<div id="main-wrapper">
    <div class="col-md-4">
        <label class="btn btn-primary"><input type="file" id="file-201" name="" class="hide" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"><i class="fa fa-folder-open-o" aria-hidden="true"></i>&nbsp;Choose Excel File</label>
    </div>
    <div class="col-md-8 padding-lr-1" style="padding-top:15px;">
        <i><span class="file_name"></span></i>
    </div>
    <div class="col-md-12" style="margin-top: 20px;">
        <button class="btn btn-primary btn-import"><i class="fa fa-upload"></i>&nbsp;Import Excel File</button>
    </div>
    <div class="form-group">
        <div class="col-md-12 import-status">
            
        </div>
    </div>
    {{-- <div class="col-md-6">
        </br>
        <form role="form" method="post" class="import-validation">
            <div class="form-group">
                <button type="button" class="form-control btn btn-primary btn-submit-import" disabled="disabled">Generate Import</button>
            </div>
        </form> 
    </div> --}}
</div>



@endsection
@section('script')
<script type="text/javascript" src='/assets/merchant/dropzone/dropzone.js'></script>
<script type="text/javascript" src="/assets/merchant/jquery-csv-master/src/jquery.csv.js"></script>
<script type="text/javascript">
    var url_link = '/general_admin/merchants/import-read-file';
</script>
<script type="text/javascript" src="/assets/merchant/import_csv.js"></script>
@endsection
