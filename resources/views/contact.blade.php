@extends('layouts.app')
@section('title')
Contact Us
@endsection
@section('header')

@endsection

@section('content')

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            @include('admin.messages.messages')    		
            <div class="col-sm-12">    			   			
                <h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
                
            </div>			 		
        </div>    	
        <div class="row">  	
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form action='/contact' id="main-contact-form" class="contact-form row" name="contact-form" method="POST">
                       {{csrf_field()}}
                       <input type="hidden" name='to' value='https//:www.eshopper.com'>
                        <div class="form-group col-md-6">
                        <input type="text" name="name" class="form-control" required="required" value="{{Auth::user() ? Auth::user()->name : ''}}" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" value="{{Auth::user() ? Auth::user()->email : ''}}" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>  
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>{{getsetting('domain')}}</p>
                        <p>{{getsetting('address')}}</p>
                        <p>Mobile: {{getsetting('mobilephone')}}</p>
                        <p>Fax: {{getsetting('fax')}}</p>
                        <p>Email: {{getsetting('web_address')}}</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="{{getsetting('facebook')}}" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="{{getsetting('twitter')}}" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="{{getsetting('google-plus')}}" target="_blank"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="{{getsetting('linkedin')}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="{{getsetting('dribbble')}}" target="_blank"><i class="fa fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    			
        </div>  
    </div>	
</div><!--/#contact-page-->

@endsection