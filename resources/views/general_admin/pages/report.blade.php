@extends('general_admin.pages.general_admin_layout')
@section('title', 'Report')
@section('description', 'Report')
@section('content')
<div class="page-title">
	<h3>categories</h3>
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="/admin">Home</a></li>
			<li class="active">categories</li>
		</ol>
	</div>
</div>
<div class=" col-md-12 tab-pane fade in active" style="margin-top:50px;">
	<div class="table-responsive" id="showHere3">
		<table class="display table table-bordered"  style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
			<thead>
				<tr>
					<th>ID</th>
					<th>Business Name</th>
					<th>Business Views</th>
					<th>Search Keywords</th>
					<th>Search Category</th>
					<th>Search Business</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($_reports as $reports)
				<tr class="count">
					<td>{{$reports->report_id}}</td>
					<td>{{$reports->business_name}}</td>
					<td>{{$reports->business_views}}</td>
					<td>{{$reports->search_keywords}}</td>
					<td>{{$reports->search_category}}</td>
					<td>{{$reports->search_business}}</td>
					<td>
						<select class="form-select form-control category_action" id="category_action" >
							<option >Action</option>
							<option value="edit">Edit</option>
							<option value="delete">Delete</option>
							<option value="view">Sub-Category</option>
							
						</select>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $_reports->render() !!}
	</div>
</div>

@endsection