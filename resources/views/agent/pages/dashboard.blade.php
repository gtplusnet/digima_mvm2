@extends('agent.layout.layout')
@section('content')
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/agent">Home</a></li>
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