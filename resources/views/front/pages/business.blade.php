@extends('front.layout.layout')
@section('title', 'Business Info')
@section('content')

<div class="banner-business-searchresult" style="background-image: url('/images/banner_arabiannights_hotel.png')">s
    <div class="container">
        <div class="pull-left">
            <div class="businesses-info-containers">
                {{-- <img class="business-logo" src="/images/business_logo.png"> --}}
                <div  class="businesses-details-containers">
                    <p class="businesses-name">{{ $business_info->business_name }}</p>
                </div>
                <div  class="businesses-details-containers">
                    <p class="businesses-phone"><i class="fa fa-phone phone" style="color:#f9c200;margin-right:10px;"></i>{{$business_info->business_phone}}</p>
                </div>
                <div class="businesses-details-containers">
                    <p class="businesses-map" ><i class="fa fa-map-marker map" style="color:#f9c200;margin-right:10px;"></i>{{$business_info->business_complete_address}}</p>
                </div> 
                <div class="businesses-details-containers pull-right">
                    <button class="btn btn-primary pull-right">Skype</button><buton class="btn btn-danger pull-right">Email</buton>
                </div>    
            </div>
        </div>
        <div class="pull-right">
            <p class="search-text">Search ><a class="search-link" href=""> {{ $business_info->business_name }}</a></p>
        </div>
    </div>
</div>
<div class="container business-containers">
    <div class="col-md-8 business-details-containers">
        <div class="border-line" >
            <div class="main-pic-container">
                <!-- <img class="main-pic" src="/images/business_profilepic01.jpg"> -->
               
                <div id="myCarousel" class="carousel slide business-carousel" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators business-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="/images/arabian_nights_pic01.png">
                        </div>
                        <div class="item">
                            <img src="/images/arabian_nights_pic02.png">
                        </div>
                        <div class="item">
                            <img src="/images/arabian_nights_pic03.png">
                        </div>
                        <div class="item">
                            <img src="/images/arabian_nights_pic04.png">
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control business-carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control business-carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- CAROUSEL SCRIPT -->
                <script type="text/javascript">
                    // INTERVAL
                    $(document).ready(function() 
                    {
                        $('#myCarousel').carousel({interval: 2000})
                    });
                    // Enable Carousel Indicators
                    $(".item1").click(function(){
                        $("#myCarousel").carousel(0);
                    });
                    $(".item2").click(function(){
                        $("#myCarousel").carousel(1);
                    });
                    $(".item3").click(function(){
                        $("#myCarousel").carousel(2);
                    });
                    $(".item4").click(function(){
                        $("#myCarousel").carousel(3);
                    });
                    // Enable Carousel Controls
                    $(".left").click(function(){
                        $("#myCarousel").carousel("prev");
                    });
                    $(".right").click(function(){
                        $("#myCarousel").carousel("next");
                    });
                </script>
            </div><!-- MAIN PIC -->
            <div class="secondary-pics-container">
                <a href="/images/arabian_nights_pic01.png" data-lightbox="roadtrip">
                    <img class="secondary-pics" src="/images/arabian_nights_pic01.png">
                </a>
                <a href="/images/arabian_nights_pic02.png" data-lightbox="roadtrip">
                    <img class="secondary-pics" src="/images/arabian_nights_pic02.png">
                </a>
                <a href="/images/arabian_nights_pic03.png" data-lightbox="roadtrip">
                    <img class="secondary-pics-last" src="/images/arabian_nights_pic03.png">
                </a>
            </div>
            <!-- LIGHTBOX SCRIPT -->
            <!-- <script>
                lightbox.option({'resizeDuration': 200,'wrapAround': true});
            </script> -->
            <div>
                <div class="overview-container">
                    <p class="overview-title">OVERVIEW</p>
                </div>
                <div class="overview-content">
                    <p class="overview-content-text">{{ $business_info->company_information }}</p>
                </div>
                <div class="overview-container">
                    <p class="overview-title">CATEGORY/KEYWORDS</p>
                </div>
                <div class="category-content">
                    <a href="skype:echo123?call">Call the Skype Echo / Sound Test Service</a>
                    <p class="overview-content-text">
                        Cruises
                    <br>Travel & Tourism
                    <br>Ticket Sales
                    <br>Hotel & Other Accommodations
                    <br>Schools Travel Agents
                    <br>Discount Stores Plans & Clubs
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 business-details-container-rightpart">
        <div class="business-map-container">
            <div id="business-map"></div>
            <script>
                function initMap() {
                    var uluru = {lat: {{$coordinates1}}, lng: {{$coordinates}}};
                    // var uluru = {lat: -25.363, lng: 131.044};
                    var map = new google.maps.Map(document.getElementById('business-map'), {
                      zoom: 17,
                      center: uluru
                    });
                    var marker = new google.maps.Marker({
                      position: uluru,
                      map: map
                    });
                }
            </script>
        </div>
        <div class="business-details-rightpart">
            <div class="details-container">
                <div class="business-details-rightpart-title">
                    <i class="material-icons">location_on</i><p class="title-margin-mi">ADDRESS:</p>
                </div>
                <p class="business-details-rightpart-content">{{ $business_info->business_complete_address }}</p>
            </div>
            <div class="details-container">
                <div class="business-details-rightpart-title">
                    <i class="fa fa-phone icon-size"></i><p class="title-margin"> PHONE:</p>
                </div>
                <p class="business-details-rightpart-content">{{ $business_info->business_phone }}</p>
            </div>
            <div class="details-container">
                <div class="business-details-rightpart-title">
                    <i class="fa fa-globe icon-size"></i><p class="title-margin"> WEBSITE:</p>
                </div>
                <p class="business-details-rightpart-content">http://yourwebsite.com</p>
            </div>
            <div class="details-container">
                <div class="business-details-rightpart-title">
                    <i class="fa fa-envelope-o icon-size"></i><p class="title-margin"> EMAIL:</p>
                </div>
                <p class="business-details-rightpart-content">{{ $business_info->user_email }}</p>
            </div>
            <div class="details-container">
                <div class="business-details-rightpart-title">
                    <i class="material-icons">access_time</i><p class="title-margin-mi">TIME:</p>
                </div>
                <p class="business-details-rightpart-content">9.00 am to 6 pm every day</p>
            </div>
            <div class="details-container-last">
                <div class="business-details-rightpart-title">
                    <i class="material-icons">payment</i><p class="title-margin-mi">PAYMENT METHODS:</p>
                </div>
                <ul class="business-details-paymentmethods">
                    <li>Cash Accepted</li>
                    <li>Paypal</li>
                    <li>American Express</li>
                    <li>Visa</li>
                    <li>American Express</li>
                    <li>MasterCard</li>
                    <li>Discover Card</li>
                    <li>Personal Checks/Business Checks</li>
                </ul>
            </div>
            <div class="sociallinks-holder">
                <div class="sociallinks-container">
                    <div class="links-holder">
                        
                        <a href=""><i class="fa fa-facebook businesspage-fb-icon"></i><p class="fb-like">Like</p></a>


                        <a href=""><i class="fa fa-twitter businesspage-twitter-icon"></i><p class="twitter-tweet">Tweet</p></a>
                    </div>
                    <div class="links-holder">
                        <a href="skype:Echo123"><i class="fa fa-skype business-skype-icon"></i><p class="go-skype">Skype</p></a>
                        <button class="btn-sendemail" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-paper-plane business-sendemail-icon"></i>
                            <p class="send-mail">Send Email</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL CSS STYLE -->
        <style type="text/css">
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
                width: 100%;
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
                /*box-shadow: 0 9px #999;*/
            }
            /*.sendemail-send-btn:active
            {
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }*/
        </style>
        <!-- MODAL -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">    
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <p class="sendemail-title">MESSAGE US</p>
                    </div>
                    <form role="form" action="/guest/add_messages" method="post">

                        {{csrf_field()}}
                    <div class="modal-body">
                   
                        <div class="sendemail-textfield-holder">
                            <label for="input-email" class="sendemail-labels">Email:</label>
                            <input type="text" name="email" class="sendemail-textfield" required/>
                            <input type="hidden" name="business_id" value="{{$business_id}}" />
                        </div>
                        <div class="sendemail-textfield-holder">
                            <label for="input-subject" class="sendemail-labels">Subject:</label>
                            <input type="text" name="subject" class="sendemail-textfield">
                        </div>
                        <div class="sendemail-textfield-holder">
                            <label for="input-help" class="sendemail-labels">How Can We Help:</label>
                            <textarea rows="11" name="messages" id="we_can_help" class="sendemail-textfield message-textarea"></textarea>
                        </div>

                        <div class="sendemail-btn-holder">
                            <button type="submit" class="sendemail-send-btn" data-toggle="modal" data-target="#myModal"><p style="color:#DFDFDF;">SEND MESSAGE</p></button>
                        </div>
                    </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
    
</div>

@endsection