<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li title="Phone Us"><a href="#"><i class="fa fa-phone"></i> {{getsetting('mobilephone')}}</a></li>
                            <li title="Contact"><a href="{{getsetting('web_address')}}/contact"><i class="fa fa-envelope"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{getsetting('facebook')}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{getsetting('twitter')}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{getsetting('linkedin')}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{getsetting('dribbble')}}" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="{{getsetting('google-plus')}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{asset('website/images/home/logo.png')}}" alt="" /></a>
                    </div>
                    
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            
                            <li><a href="/wishlist"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="/cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @if(!Auth::user())
                                <li><a href="/login"><i class="fa fa-lock"></i> Sign in</a></li>
                                <li><a href="/register"><i class="fa fa-user"></i> Sign Up</a></li>
                            @else
                                <li><a href="/logout"><i class="fa fa-unlock"></i>Logout</a></li>
                            @endif
                            @if((Auth::user()) &&  (Auth::user()->isAdmin == 1 || Auth::user()->isAdmin == 2 || Auth::user()->isAdmin == 3))
                                <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                            @endif    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/products">Products</a></li>
                                    <li><a href="/products-details">Product Details</a></li> 
                                    <li><a href="/cart">Cart</a></li>
                                </ul>
                            </li> 
                           
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">                        
                        <span class="input-group-btn">
                            <button class="btn btn-warning" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div><!-- /input-group -->
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
