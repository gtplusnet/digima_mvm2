@extends('front.layout.layout')
@section('title', 'Business Info')
@section('content')
<div class="banner-business-searchresult" style="background-image: url('{{$business_info->business_banner}}')">
    <div class="container">
        <div class="top-detail-mob">
            <p class="search-text">Tražilica ><a class="search-link  notranslate" href=""> {{ $business_info->business_name }}</a></p>
        </div>
        <div class="top-detail-container">
            <div class="top-detail">
                <p class="search-text">Tražilica ><a class="search-link  notranslate" href=""> {{ $business_info->business_name }}</a></p>
            </div>
            <div class="businesses-info-containers">
                <div  class="businesses-details-containers">
                    <p class="businesses-name  notranslate">{{ $business_info->business_name }}</p>
                </div>
                <div  class="businesses-details-containers">
                    <p class="businesses-phone  notranslate"><i class="fa fa-phone phone" style=""></i>{{$business_info->business_phone}}</p>
                </div>
                <div class="businesses-details-containers" style="">
                    
                    <div class="businesses-map  notranslate" >
                        <i class="fa fa-map-marker map" style=""></i>{{$business_info->business_complete_address}}
                    </div>
                    <div class="pull-right social-button">
                            <a href="skype:{{$business_info->business_phone}}"><button class=" btn-skype"><i class="fa fa-skype skype" aria-hidden="true"></i>Pozovi na Skype</button></a>
                            <buton class=" btn-email" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope email" aria-hidden="true"></i>Pošalji Email</buton>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="container business-containers">
    <div class="col-md-8 business-details-containers">
        <div class="border-line" >
            <!-- LIGHT SLIDER -->
            <div class="demo">
                <ul id="lightSlider">
                    <li data-thumb="{{$business_info->business_banner}}">
                        <img src="{{$business_info->business_banner}}" />
                    </li>
                    <li data-thumb="{{$business_info->other_image_one}}">
                        <img src="{{$business_info->other_image_one}}" />
                    </li>
                    <li data-thumb="{{$business_info->other_image_two}}">
                        <img src="{{$business_info->other_image_two}}" />
                    </li>
                    <li data-thumb="{{$business_info->other_image_three}}">
                        <img src="{{$business_info->other_image_three}}" />
                    </li>
                </ul>
            </div>

            <div>
                <div class="overview-container">
                    <p class="overview-title">PREGLED</p>
                </div>
                <div class="overview-content">
                    <p class="overview-content-text">{{ $business_info->company_information }}</p>
                </div>
                <div class="overview-container">
                    <p class="overview-title">KATEGORIJE</p>
                </div>
                <div class="category-content">
                    <p class="overview-content-text">
                        @foreach($_tag_category as $tag_category)
                        {{$tag_category->business_category_name}}<br>
                        @endforeach
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
                    var map = new google.maps.Map(document.getElementById('business-map'), {
                      zoom: 17,
                      center: uluru
                    });
                    var marker = new google.maps.Marker({
                      position: "Maria Clara St. Sta. Cruz Manila",
                      map: map
                    });
                }
            </script>
        </div>
        <div class="business-details-rightpart">
            <style>
            .facebook {
                  padding: 6px;
                  font-size: 30px;
                  width: 100px;
                  text-align: center;
                  text-decoration: none;
                  margin: 5px 2px;
                  border-radius:5px;
                  
                }
            </style>
            <div class="details-container">
                <div class="sociallinks-container">
                    <div class="links-holder">
                        @if($business_info->facebook_url=="")
                        <iframe class="facebook" src="https://www.facebook.com/plugins/like.php?href=http://www.facebook.com/digimawebsolutions&width=88&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId=275633406278448" width="88" height="40" title="Twitter Tweet Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                        @else
                        <iframe class="facebook" src="https://www.facebook.com/plugins/like.php?href={{$business_info->facebook_url}}&width=88&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId=275633406278448" width="88" height="40" title="Twitter Tweet Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                        @endif
                        <iframe class="twitter"  src="https://platform.twitter.com/widgets/tweet_button.html?size=l&url={{$business_info->twitter_url}}/&via=mvm.digimahouse.com&related=twitterapi%2Ctwitter&text=Yellow%20Pages%20Share&hashtags=TheRightPlaceForBusiness%2CSignUpNow%20https://mvm.digimahouse.com/business/1" width="88" height="40" title="Twitter Tweet Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    </div>
                   
                </div>
            </div>
            <div class="details-container">
                <div class="business-details-rightpart-title">
                    <i class="fa fa-calendar icon-size"></i><p class="title-margin transform-uppercase"> GODINA OSNIVANJA:</p>
                </div>
                <p class="business-details-rightpart-content">{{ $business_info->year_established }}</p>
            </div>
           
            <div class="details-container">
                <div class="business-details-rightpart-title">
                    <i class="fa fa-globe icon-size"></i><p class="title-margin">WEB STRANICA:</p>
                </div>
                <p class="business-details-rightpart-content  notranslate">{{ $business_info->business_website }}</p>
            </div>
            <div class="details-container">
                <div class="business-details-rightpart-title">
                    <i class="fa fa-envelope-o icon-size"></i><p class="title-margin"> E-MAIL:</p>
                </div>
                <p class="business-details-rightpart-content  notranslate">{{ $business_info->user_email }}</p>
            </div>
            <div class="details-container">
                <div class="business-details-rightpart-title">
                    <i class="material-icons">access_time</i><p class="title-margin-mi">VRIJEME:</p>
                </div>
                @foreach($_business_hours as $business_hours)
                    <p class="business-details-rightpart-content">
                        <table style="width:100%;margin-left:30px;">
                            <td style="width:50%;color: #7E8692;font-size: 13px;">{{$business_hours->days}}  </td>
                            <td style="width:50%;color: #7E8692;font-size: 13px;"> {{date('h:i a', strtotime($business_hours->business_hours_from))}} - {{date('h:i a', strtotime($business_hours->business_hours_to))}}</td>
                       </table>
                    </p>
                @endforeach
            </div>
            <div class="details-container-last">
                <div class="business-details-rightpart-title">
                    <i class="material-icons">payment</i><p class="title-margin-mi">NAČINI PLAĆANJA:</p>
                </div>
                <ul class="business-details-paymentmethods">
                    @foreach($_payment_method as $payment_method)
                    <li>{{$payment_method->payment_method_name}}</li>
                    @endforeach
                </ul>
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
                max-width: 700px;
                min-height: 237px;
            }
            .sendemail-btn-holder
            {
                padding: 0px;
                margin-top: 15px;
                margin-bottom: 38px;
            }
            .message_send-send-btn
            {
                border: 0px;
                background-color: #3D516D;
                font-size: 15px;
                padding: 13px 20px 0px 20px;
                border-radius: 3px;
                /*box-shadow: 0 9px #999;*/
            }
        </style>
        <!-- MODAL -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">    
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <p class="sendemail-title">Posaljite Nam Poruku</p>
                    </div>

                    {{-- <form role="form" action="/guest/add_messages" method="post">
                    {!!csrf_field()!!} --}}
                    <div id="ajax-loader" style="display: none; text-align: center; margin-top: 70px;">
                        <img src="/assets/img/loading.gif"/>
                    </div>
                    <div class="modal-body" id="hiddenMo">
                        <div class="sendemail-textfield-holder">
                            <label for="input-email" class="sendemail-labels">E-mail:</label>
                            <input type="text" name="email" id="email" class="sendemail-textfield" required/>
                            <input type="hidden" name="business_id" id="business_id" value="{{$business_id}}" />
                        </div>

                        <div class="sendemail-textfield-holder">
                            <label for="input-subject" class="sendemail-labels">Predmet:</label>
                            <input type="text" name="subject"  id="subject" class="sendemail-textfield">
                        </div>

                        <div class="sendemail-textfield-holder">
                            <label for="input-help" class="sendemail-labels">Kako vam možemo pomoći:</label>
                            <textarea rows="11" name="messages" id="messages" class="sendemail-textfield message-textarea"></textarea>
                        </div>

                        <div class="sendemail-btn-holder">
                            <button type="button" class="message_send-send-btn" name="message_send" id="messageSend"><p style="color:#DFDFDF;">Pošalji Poruku</p></button>
                        </div>

                    </div>
                    {{-- </form> --}}
                </div>  
            </div>
        </div>

        
        <div style="margin-top:80px;" class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body" id="show_user" style="margin-bottom: 160px;" >
                        <div class="col-sm-12" id="success_alert">
                        </div>
                         <div class="col-sm-12">
                         <center>
                        <button type="button" class="btn btn-success" onClick="window.location.reload();"  data-dismiss="modal">Gotovo</button>
                    </center>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/front/business.js"></script>






<!-- CAROUSEL SCRIPT -->
<script type="text/javascript">
    // INTERVAL
    $(document).ready(function() 
    {
        $('#myCarousel').carousel({interval: 2000})


        /*LIGHT SLIDER*/
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 9
        });


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

@endsection