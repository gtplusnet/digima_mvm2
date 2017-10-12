@extends('general_admin.pages.general_admin_layout')
@section('title', 'manage user')
@section('description', 'manage user')
@section('content')
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<div class="page-title">
    <h3>Manage Team/Agent</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/admin">Home</a></li>
            <li class="active">Manage Team/Agent</li>
        </ol>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/admin/general_admin/assets/js/manage_user.js"></script>

@endsection