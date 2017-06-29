<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>CROTIA Directory | {{ $page }}</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- CSS Ko -->
        <link rel="stylesheet" type="text/css" href="/assets/front/css/layout.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/home.css">
    </head>
    <body>
        <div class="container">
            <table class="table-navbar">
                <tbody>
                    <tr>
                        <td>
                            <nav class="navbar navbar-default navbar-head">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button> -->
                                        <img src="/images/yellow-finger-logo.jpg">
                                        <a class="company-name" href="#">Croatia Directory</a>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="/">Home</a></li>
                                            <li class="{{ Request::segment(1) == 'about' ? 'active' : '' }}"><a href="/about">About</a></li>
                                            <li class="{{ Request::segment(1) == 'contact' ? 'active' : '' }}"><a href="/contact">Contact Us</a></li>
                                        </ul>
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="#">Login</a></li>
                                            <li><a href="#">Advertise with us</a></li>
                                        </ul>
                                    </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                            </nav>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> <!-- container -->
        <div class="container">
            <form method="get" action="" class="searchbar-header">
                    <div class="col-md-3 form-holder">
                        <div>
                            <p>Search Businesses</p>
                        </div>
                        <div class="second-row">
                            <input class="business-name-textbox" type="text" name="business_name" placeholder="e.g. McDonald, Algoritam or Robinsons">
                        </div>
                    </div>
                    <div class="col-md-3 form-holder">
                        <div>
                            <p>Counties</p>
                        </div>
                        <div class="second-row">
                            <select class="counties-selectbox">
                                <option value="" disabled selected>Counties</option>
                                <option>Zagreb County</option>
                                <option>Dubrovnik–Neretva County</option>
                                <option>Split-Dalmatia County</option>
                                <option>---------------------</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 form-holder">
                        <div>
                            <p>ZIP Code</p>
                        </div>
                        <div class="second-row">
                            <input class="zipcode-textbox" type="text" name="zip_code" placeholder="Optional">
                        </div>
                    </div>
                    <div class="col-md-2 form-holder">
                        <div>
                            <p>Radius</p>
                        </div>
                        <div class="second-row">
                            <select class="radius-selectbox">
                                <option value="" disabled selected>Within</option>
                                <option>5 miles</option>
                                <option>10 miles</option>
                                <option>15 miles</option>
                                <option>30 miles</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 form-holder">
                        <button type="submit" class="btn btn-primary search-btn">Search</button>
                    </div>
            </form>
        </div>
        <div class="container">
            <ul class="filter-option">
                <li class="filters"><a href="#">Search by City</a></li>
                <li class="filters"><a href="#">Search by Categories</a></li>
            </ul>
        </div>
        @yield('content')
        <div class="container">
            <div class="navbar-footer">
                <div>
                    <ul class="nav-footer-bar">
                        <div class="nav-footer-holder">
                            <li class="nav-footer"><a href="#">Yellow Pages</a></li>
                        </div>
                        <div class="nav-footer-holder">
                            <li class="nav-footer"><a href="#">About Us</a></li>
                        </div>
                        <div class="nav-footer-holder">
                            <li class="nav-footer"><a href="#">Contact Us</a></li>
                        </div>
                        <div class="nav-footer-holder">
                            <li class="nav-footer"><a href="#">Support</a></li>
                        </div>
                        <div class="nav-footer-holder">
                            <li class="nav-footer"><a href="#">Term of Use</a></li>
                        </div>
                        <div>
                            <li class="nav-footer"><a href="#">Privacy Policy</a></li>
                        </div>
                    </ul>
                </div>
                <div>
                    <ul class="nav-footer-bar">
                        <div class="nav-footer-holder">
                            <li class="nav-footer"><a href="#">Advertise With Us</a></li>
                        </div>
                        <div class="nav-footer-holder">
                            <li class="nav-footer"><a href="#">Add/ Update Listing</a></li>
                        </div>
                        <div class="nav-footer-holder">
                            <li class="nav-footer"><a href="#">Business Profile</a></li>
                        </div>
                        <div class="nav-footer-holder">
                            <li class="nav-footer"><a href="#">Login</a></li>
                        </div>
                        <div>
                            <li class="nav-footer"><a href="#">FAQ</a></li>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="footer-holder">
                <p class="footer">© 2017 USdirectory.com. All rights reserved.</p>
                <p class="footer">No portion of this site may be copied, reproduced, or published without the express written permission of USdirectory.com.</p>
                <p class="footer">All products and companies mentioned on our site are trademarks and/or registered trademarks of their respective owners.</p>
                <p class="footer">USDIRECTORY LIMITED * Office 3 Unit R1, Imperial Way, Watford WD24 4YY, UK</p>
            </div>
        </div>
        <!-- Javascripts -->
       
        
    </body>
</html>