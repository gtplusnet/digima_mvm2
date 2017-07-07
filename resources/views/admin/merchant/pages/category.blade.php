@extends('admin.merchant.layout.layout')
@section('content')
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/merchant">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
               <div class="panel-heading clearfix">
                <h3 class="panel-title">Basic Tree</h3>
                </div>
                <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Category List</h3>
                            <ul id="tree1">
                                @foreach($categories as $category)
                                    <li>
                                        {{ $category->title }}
                                        @if(count($category->childs))                                           
                                            @include('admin.merchant.pages.category.manageChild',['childs' => $category->childs])
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>
    </div><!-- Row -->
    <!-- Row -->                    
</div>
@endsection