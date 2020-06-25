<html>
    <head>
        <title>RB-Gym</title>
        <meta charset="UTF-8" />
        
        <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-login.css') }}"/>
        <link rel="stylesheet" href="{{ asset('fonts/backend_fonts/css/font-awesome.css ') }}"  />
		<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' type='text/css'>
        <script src="{{asset('js/backend_js/jquery.min.js')}}"></script>
        <script src="{{asset('js/backend_js/matrix.login.js')}}"></script>
    </head>

    <body>
       
        @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block" style="margin: 20px!important;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong> {!! session ('flash_message_error') !!}</strong>
            </div>
        @endif
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong> {!! session ('flash_message_success') !!}</strong>
            </div>
        @endif
        

        <div id="loginbox">            
            <form class="form-vertical" id="loginform" method="post" action="{{url('admin')}}">{{csrf_field() }}
				 <div class="control-group normal_text"> <h3><img src="images/backend_images/logo1.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg">
                                <i class="icon-user"> </i>
                            </span>
                            
                            <input type="email" name="email" id="inputEmail" placeholder="Email address" required>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly">
                                <i class="icon-lock"></i>
                            </span>
                            <input type="password" name="password" id="inputPassword" placeholder="Password" required>

                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right">
                        <input type="submit" class="btn btn-success" value="Login" /> 
                    </span>
                </div>
            </form>

            <form id="recoverform" method="post" action="{{url('admin/forgot-password')}}" class="form-vertical">{{csrf_field() }}
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" name="user_email" id="user_email" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-info" value="Recover"> </span>
                </div>
            </form>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>
</html>
