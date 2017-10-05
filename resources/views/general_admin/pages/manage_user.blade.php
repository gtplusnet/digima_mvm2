@extends('general_admin.pages.general_admin_layout')
@section('title', 'manage user')
@section('description', 'manage user')
@section('content')
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<div class="page-title">
    <h3>categories</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/admin">Home</a></li>
            <li class="active">categories</li>
        </ol>
    </div>
</div>
<div class="tab-content" style="">
	<div class="col-md-12">
		<div class="pull-left" style="margin:20px 0px 20px 20px">
			<button type="button"  data-toggle="modal" data-target="#myModal"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New</button>
		</div>
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Category</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 150px;" >
						<div id="showHere1">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Category Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="cat_name" id="cat_name"  style="width:100%;margin-bottom: 20px;"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Category Information</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="cat_info" id="cat_info" style="width:100%"/>
							</div>
						</div>
						<div class="col-sm-12">
							<center><button type="submit" class="save_category btn btn-primary" name="save_category" id="save_category">Save</button></center>
						</div>
						
						
					</div>
					<div class="modal-footer" style="border:0px;">
						
					</div>
				</div>
			</div>
		</div>
		<div class="pull-right" style="margin:20px 20px 20px 0px">
			<form class="form-inline">
				<div class="form-group">
					<input type="text" class="form-control" name="search_key" id="search_key">
				</div>
				<button type="button" class="btn btn-success" name="search_button" id="search_button">Search</button>
			</form>
		</div>
	</div>
	<div id="home" class=" col-md-12 tab-pane fade in active">
		<div class="table-responsive" id="showHere3">
			@if (Session::has('message'))
			   <div class="alert alert-danger"><center>{{ Session::get('message') }}</center></div>
			@endif
			<table class="display table" style="width: 100%; cellspacing: 0;">
				<thead> 
                    <tr>
                        <th>Team</th>
                        <th></th>
                        <th>Full Name</th>
                        <th></th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Alternative No</th>
                        <th>Other Information</th>
                        <th>Action</th>
                    </tr>
                </thead>
				<tbody>
			    @foreach ($viewagent as $newagent) 
                    <tr>
                        <td>{{ $newagent->team_name}}</td>
                        <td>{{ $newagent->prefix}}</td>
                        <td>{{ $newagent->first_name}}</td>
                        <td>{{ $newagent->last_name}}</td>
                        <td>{{ $newagent->email}}</td>
                        <td>{{ $newagent->primary_phone}}</td>
                        <td>{{ $newagent->secondary_phone}}</td>
                        <td>{{ $newagent->other_info}}</td>
						<td>
							<select style="height:30px;width:80px" class="action_modal" id="action_modal">
								<option>Action</option>
								<option value="edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</option>
								<option><i class="fa fa-trash" aria-hidden="true"></i> Delete</option>
							</select>

							<a href="#"><button type="button" class="btn btn-warning" data-toggle="modal"  id="view_btn" data-target="#myModalEdit{{$newagent->business_category_id}}"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</button>
						<a href="/general_admin/delete_category/{{$newagent->business_category_id}}"><button type="button" class="btn btn-danger" >Delete</button></td>
					</tr>
					<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="modal-organiza-label" aria-hidden="true">
					{{-- <div class="modal fade" id="myModalEdit" role="dialog"> --}}
						<div class="modal-dialog modal-md">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close reload" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit Category</h4>
								</div>
								<div class="modal-body" style="margin-bottom: 150px;" >
									<div id="showHere2">
									</div>
									<div class="col-sm-12">
										<div class="form-group col-md-3">
											<label for="business_name" >Category Name</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$newagent->business_category_name}}" type="text" class="form-control" name="cat_name" id="cat_name_edit"  style="width:100%;margin-bottom: 20px;"/>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group col-md-3">
											<label for="business_name" >Category Information</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$newagent->business_category_information}}" type="text" class="form-control" name="cat_info" id="cat_info_edit" style="width:100%"/>
											<input value="{{$newagent->business_category_id}}" type="hidden" id="id_to_edit"/>
										</div>
									</div>
									<div class="col-sm-12">
										<center><button type="submit" class="update_category btn btn-primary" name="update_category" id="update_category">Update</button></center>
									</div>
									
									
								</div>
								<div class="modal-footer" style="border:0px;">
									
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
</div>










sample
<label>Recinto</label>
<select class="form-control">
  <option>O meu coliseu</option>
  <option>volvo</option>
  <option>A minha arena</option>
  <option>a garagem da minha vizinha</option>
  <option>Na esquina</option>
</select>


<!-- MODAL -->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="modal-organiza-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">&times;</span><span class="sr-only">Close</span> </button>
        <div class="blue-title">Contactar o organizador do evento</div>
      </div>
      <div class="modal-body"> 
        <!--   <div class="error-service-login">Ocorreu um erro. Tente mais tarde.</div>-->
        
        <form role="form" action="" method="post" class="registration-form">
          <div class="form-group">
            <label for="form-first-name">O seu nome</label>
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name="form-first-name" class="form-control">
            </div>
            <span class="help-inline">Mensagem de erro do campo</span> </div>
          <div class="form-group">
            <label for="form-email">O seu endereço de E-mail</label>
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control" name="username">
            </div>
            <span class="help-inline">Mensagem de erro do campo</span> </div>
          <div class="form-group">
            <label>Mensagem</label>
            <textarea class="form-control"></textarea>
            <span class="help-inline">Mensagem de erro do campo</span></div>
        </form>
        <div> </div>
        <br>
        <button type="Submit" class="btn btn-success">Enviar</button>
        <button type="Submit" class="btn btn-cancel">Cancelar</button>
      </








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/admin/general_admin/assets/js/manage_user.js"></script>

@endsection