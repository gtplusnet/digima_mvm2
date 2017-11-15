@extends('merchant.layout.layout')
@section('content')


<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/merchant/dashboard">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>

<style>a [href="mailto"]{color: red;}</style>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-13">
            <div class="panel panel-white">
               <div class="panel-heading clearfix">
                <h3 class="panel-title">Messages</h3>
                </div>
                <div class="panel-body"> 
                <form class="form-horizontal" method="POST" action="/merchant/messages" style="">
            
                @if (Session::has('danger'))
                <div class="alert alert-danger"><center>{{ Session::get('danger') }}</center></div>
                @endif 

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <table class="table table-bordered" style="width: 100%; text-align: center;" cellpadding="0" cellspacing="0"  border="1">
                 <thead>
                            <tr>
                            <th style="text-align: center;font-size: 13px">MAIL TO</th>
                            <th style="text-align: center;font-size: 13px">SUBJECT</th>
                            <th style="text-align: center;font-size: 13px">MESSAGES</th>
                            <th style="text-align: center;font-size: 13px">ACTION</th>
                            </tr>   
                            </thead>
                            @foreach($guest_messages as $data)
                            <tr>
                            <td><a  href="mailto:{{$data->email}}" data-id="{{$data->email}}">{{$data->email}}</p></td>
                            <td>{{$data->subject}}</td>
                            <td>{{$data->messages}}</td>
                            <td>
                                <a href="/merchant/delete_messages/{{$data->guest_messages_id}}">
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>Delete
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                </table> 
                </div>
            </div>
        </div>
    </div><!-- Row -->
    <!-- Row -->                    
</div>

<!--  <style type="text/css">

            .modal-header
            {
                background-color: #3D516D;
                padding: 7px 20px;
                border-bottom: unset;

            }
            .modal-header .close
            {
                margin-top: -2px;
            }
            button.close
            {
                color: #DFDFDF;
            }
            .close
            {
                font-size: 30px;
                opacity: unset;
            }
            .sendemail-title
            {
                color: #DFDFDF;
                 margin: 0px;
                font-size: 20px;
            }
            .modal-body
            {
                padding: 10px 40px;
                border: 1px solid #999;
            }
            .sendemail-textfield-holder
            {
                padding: 0px;
                margin-top: 15px;
                margin-bottom: 5px;
            }
            .sendemail-labels
            {
                font-size: 15px;
                font-weight: 100;
                color: #999;
            }
            .sendemail-textfield
            {
                width: 92%;
            }
            .message-textarea
            {
                max-width: 516px;
                min-height: 237px;
            }
            .sendemail-btn-holder
            {
                padding: 0px;
                margin-top: 15px;
                margin-bottom: 38px;
            }
            .sendemail-send-btn
            {
                border: 0px;
                background-color: #3D516D;
                font-size: 15px;
                padding: 13px 20px 0px 20px;
                border-radius: 3px;
            }
            </style>

            <script type="text/javascript" src="/assets/js/global.ajax.js"></script>
            <script>
                $(document).ready(function()
                {
                    $('.myModals').click(function()
                    {
                        var mail=$(this).data('id');
                        $('#myEmail').val(mail);
                        $('#myModal').modal('show');

                    });
                    // $('#sub').click(function()
                    // {

                    //     var email = $('#email').val();
                    //     var subject = $('#subject').val();
                    //     var messages = $('#messages').val();

                    //      $.ajax({
                    //         type:'POST',
                    //         url:'/merchant/messages/reply',
                    //         data:{email: email,subject: subject,messages: messages},
                    //         dataType:'text',
                    //     }).done(function(data)
                    //     {   
                    //         $(".myModal").show();
                    //         $("#myModal").modal("hide");
                    //         // $('#showHereSuccess').html(data);
                    //     });




                    });
                });
            </script>

            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">    
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <p class="sendemail-title">MAIL TO </p>
                    </div>
                    <form role="form" action="/merchant/messages/reply" method="post">

                        {{csrf_field()}}

                        <div class="modal-body">
                        <div class="sendemail-textfield-holder">
                            <label for="input-email" class="sendemail-labels">Email:</label>
                            <input type="text" name="email" class="sendemail-textfield" id="myEmail" readonly="">
                            <input type="hidden" name="business_id" value="">
                        </div>

                        <div class="sendemail-textfield-holder">
                            <label for="input-subject" class="sendemail-labels">Subject:</label>
                            <input type="text" name="subject" class="sendemail-textfield">
                        </div>
                        <div class="sendemail-textfield-holder">
                            <label for="input-help" class="sendemail-labels">MESSAGES:</label>
                            <textarea rows="11" name="messages" id="we_can_help" class="sendemail-textfield message-textarea"></textarea>
                        </div>

                        <div class="sendemail-btn-holder">
                            <button type="button" id="sub" class="sendemail-send-btn" ><p style="color:#DFDFDF;">REPLY</p></button>
                        </div>
                    </div>
                 </form>
                </div>  
            </div>
        </div> -->


<script type="text/javascript" src="/assets/admin/merchant/assets/pages/category/category.js"></script>
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

@endsection