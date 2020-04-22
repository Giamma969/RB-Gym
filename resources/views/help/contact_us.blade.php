@extends('layouts.frontLayout.front_design')
@section('content')

<section>
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<!-- <div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					
				</div>			 		
			</div>    	 -->
    		<div class="row" style="margin-top:50px;">
            @if(Session::has('flash_message_error'))
				<div class="alert alert-error alert-block" style="background-color:#f2dfd0; margin-right:15px; margin-left:15px;">
					<button type="button" class="close" data-dismiss="alert">×</button>
						<strong> {!! session ('flash_message_error') !!}</strong>
				</div>
			@endif
			@if(Session::has('flash_message_success'))
				<div class="alert alert-success alert-block" style="margin-right:15px; margin-left:15px;">
					<button type="button" class="close" data-dismiss="alert">×</button>
						<strong> {!! session ('flash_message_success') !!}</strong>
				</div>
			@endif
              	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="{{ url('/contact-us' )}}"> {{ csrf_field() }}
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Send">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>RB-Gym Inc.</p>
							<p>48 Via Vetoio L'Aquila, IT 67100, AQ</p>
							<p>L'Aquila ITA</p>
							<p>Mobile: +39 3333333333</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@RB-Gym.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="https://twitter.com/explore" target="_blank"><i class="fa fa-twitter"></i></a>
								</li>
                                <li>
									<a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
</section>

@endsection
	
	