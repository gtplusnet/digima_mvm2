@extends('admin.layout.layouts')
@section('content')

<div class="container">
  <h2>Large Modal</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Headergfdg</h4>
        </div>
        <div class="modal-body">
          <p>This is a large modal.fdsfdsf</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>







<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/admin">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>

<div id="main-wrapper">
    <div class="row">
        <div class="col-md-4 center">
            <h1 class="text-xxl f-black text-center"><i class="icon-wrench"></i></h1>
            <h2 class="text-xl f-black text-center" id="counter"></h2>
            <div class="details">
                <h3 class="f-black">OUR WEBSITE IS UNDER CONSTRUCTION.</h3>
                <p class="f-black">WE ARE COMING SOON.</p>
            </div>
        </div>
    </div><!-- Row -->
    <!-- Row -->                    
</div>
@endsection