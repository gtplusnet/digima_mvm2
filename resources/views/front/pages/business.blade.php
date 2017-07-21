@extends('front.layout.layout')
@section('content')
<div class="banner-searchresult" style="background-image: url('/images/banner_arabiannights_hotel.jpg')">
    <div class="container">
        <div class="pull-left">
            <div class="business-logo-container">
                <img class="business-logo" src="/images/business_logo.png">
                <p class="business-logo-name">ARABIAN NIGHTS HOTEL</p>
            </div>
        </div>
        <div class="pull-right">
            <p class="search-text">Search > <a class="search-link" href="">Arabian Night's Hotel</a></p>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-8 business-details-container">
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
                        <img src="images/arabian_nights_pic01.png">
                    </div>
                    <div class="item">
                        <img src="images/arabian_nights_pic02.png">
                    </div>
                    <div class="item">
                        <img src="images/arabian_nights_pic03.png">
                    </div>
                    <div class="item">
                        <img src="images/arabian_nights_pic04.png">
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
                <img class="secondary-pics" src="images/arabian_nights_pic01.png">
            </a>
            <a href="/images/arabian_nights_pic02.png" data-lightbox="roadtrip">
                <img class="secondary-pics" src="images/arabian_nights_pic02.png">
            </a>
            <a href="/images/arabian_nights_pic03.png" data-lightbox="roadtrip">
                <img class="secondary-pics" src="images/arabian_nights_pic03.png">
            </a>
            <a href="/images/arabian_nights_pic04.png" data-lightbox="roadtrip">
                <img class="secondary-pics-last" src="images/arabian_nights_pic04.png">
            </a>
        </div>
        <!-- LIGHTBOX SCRIPT -->
        <script>
            lightbox.option({'resizeDuration': 200,'wrapAround': true});
        </script>

        <div>
            <div class="overview-container">
                <p class="overview-title">OVERVIEW</p>
            </div>
            <div class="overview-content">
                <p class="overview-content-text">The hotel is arranged on three floors, without a lift. On the ground floor, apart from the reception, there is a comfortable lounge where you can sit and drink tea, or just read. There is also a splendid terrace, where, you can relax and immerge yourself from morning on wards in the atmosphere of Venetian daily life, watching the city travelling about by water and people gathering together and filling the alleyways and little squares with their chatter.</p>
                <p class="overview-content-text">This Hotel is the right choice for visitors who are searching for a combination of charm, peace and quiet, and a convenient position from which to explore Venice. It is a small, comfortable hotel, situated on the Canale di Cannaregio. The Templatic family and their staff offer an attentive, personalized service and are always available to offer any help to guests.</p>
                <p class="overview-content-text">The hotel is arranged on three floors, without a lift. On the ground floor, apart from the reception, there is a comfortable lounge where you can sit and drink tea, or just read. There is also a splendid terrace, where, you can relax and immerge yourself from morning onwards in the atmosphere of Venetian daily life, watching the city travelling about by water and people gathering together and filling the alleyways and little squares with their chatter.</p>
                <p class="overview-content-text">The rooms are arranged on the first, second and third floors. On the top floor, there is also a delightful terrace or solarium available for the use of guests, from where you can enjoy the wonderful view.</p>
                <p class="overview-content-text">The buffet breakfast is served in the lounge on the ground floor, and also outside on our little patio during the summer months.</p>
                <p class="overview-content-text">The hotel provides an internet point, and a Wi-Fi service is available for an additional fee.</p>
            </div>
            <div class="overview-container">
                <p class="overview-title">CATEGORY/KEYWORDS</p>
            </div>
            <div class="category-content">
                <p class="overview-content-text">Cruises
                <br>Travel & Tourism
                <br>Ticket Sales
                <br>Hotel & Other Accommodations
                <br>Schools Travel Agents
                <br>Discount Stores Plans & Clubs</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 business-details-container-rightpart">
        <div class="business-details-rightpart">
            <div class="details-container">
                <div class="business-details-rightpart-title">
                    <i class="material-icons">location_on</i><p class="title-margin-mi">ADDRESS:</p>
                </div>
                <p class="business-details-rightpart-content">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>
            </div>
            <div class="details-container">
                <div class="business-details-rightpart-title">
                    <i class="fa fa-phone icon-size"></i><p class="title-margin"> PHONE:</p>
                </div>
                <p class="business-details-rightpart-content">+12 345 6789</p>
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
                <p class="business-details-rightpart-content">email@gmail.com</p>
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
                    <a href=""><i class="fa fa-facebook businesspage-fb-icon"></i><p class="fb-like">Like</p></a>
                    <a href=""><i class="fa fa-twitter businesspage-twitter-icon"></i><p class="twitter-tweet">Tweet</p></a>
                </div>
            </div>
        </div>
        <div class="search-listing-holder">
                <div class="search-listing-container">
                    <p class="searchlisting-title">SEARCH LISTING</p>
                    <form>
                        <div class="form-container">
                            <label class="form-label">Keyword</label>
                            <input class="box-format" type="text" name="keyword" placeholder="Search">
                        </div>
                        <div class="form-container">
                            <label class="form-label">Category</label>
                            <select class="box-format">
                                <option value="" disabled selected>Select Category</option>
                                <option></option>
                                <option>Most Like</option>
                                <option>Most Popular</option>
                                <option>Newest</option>
                                <option>---------------------</option>
                            </select>
                        </div>
                        <div class="form-container">
                            <label class="form-label">Counties</label>
                            <select class="box-format">
                                <option value="" disabled selected>Select County</option>
                                <option></option>
                                <option>Bjelovar-Bilogora</option>
                                <option>Brod-Posavina</option>
                                <option>Dubrovnik-Neretva</option>
                                <option>---------------------</option>
                            </select>
                        </div>
                        <div class="form-container">
                            <label class="form-label">ZIP Code</label>
                            <input class="box-format" type="text" name="zip_code" placeholder="Search">
                        </div>
                        <div>
                            <input type="submit" value="Search" class="searchlisting-btn">
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection