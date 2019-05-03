@extends('layout.general_layout')
@section('content')

<style>
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
    
</style>
<div class="page-title" style="margin-bottom:20px;">
    <h3>Import Merchant</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/general_admin/dashboard">Home</a></li>
            <li class="active">Import Merchant</li>
        </ol>
    </div>
</div>
<div id="main-wrapper" style="text-align: right">
    <a href="/general_admin/merchants/import" class="btn btn-success" >Download Template</a>
</div>
<div id="main-wrapper">
    <div class="col-md-6">
        <h4><span class="counter">0</span> Merchant Added</h4>
        <div class="progress">
            <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>
        </div>
        <div id="ImportContainer">
            <form action="/general_admin/merchants/import_url" id="myDropZoneImport" class="dropzone" method="post" enctype="multipart/form-data">
                <input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
                <input type="file" id="files" name="files[]" style="display: none"><br>
                <div class="dz-message">
                    <span class="needsclick">
                        <h1><b>DRAG & DROP</b></h1>
                        <h4>your CSV File here or click it to browse</h4>
                    </span>
                </div>
                <div class="pull-right">
                    <output id="list"></output> 
                </div>
            </form>
        </div>
        </br>
        </br>
    </div>
    <div class="col-md-6">
        </br>
        <form role="form" method="post" class="import-validation">
            <div class="form-group">
                <button class="form-control btn btn-custom-primary btn-submit" disabled="disabled">Generate Import</button>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <div class="table-responsive" style="overflow: auto">
            <table class="table table-condensed table-stripped table-hover table-import-container table-bordered">
                <thead>
                    <tr>
                       <th>Status</th>
                        <th>Description</th>
                        <th>Prefix</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Email Address</th>
                        <th>Password</th>
                        <th>Company Name</th>
                        <th>Membership</th>
                        <th>Main Telephone</th>
                        <th>Alternative Phone</th>
                        <th>Fax Number</th>
                        <th>Business Address</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Zip Code</th>
                        <th>Facebook URL</th>
                        <th>Twitter username</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript" src='/assets/merchant/dropzone/dropzone.js'></script>
<script type="text/javascript" src="/assets/merchant/jquery-csv-master/src/jquery.csv.js"></script>
<script type="text/javascript">
    var url_link = '/general_admin/merchants/import-read-file';
</script>
<script type="text/javascript" src="/assets/merchant/import_csv.js"></script>
@endsection