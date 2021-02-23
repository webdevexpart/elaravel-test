<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('backend/images/favicon_1.ico')}}">

        <title>Admin Login</title>

        <!-- Base Css Files -->
        <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{asset('backend/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('backend/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('backend/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('backend/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{asset('backend/css/waves-effect.css')}}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{asset('backend/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{asset('backend/js/modernizr.min.js')}}"></script>
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Admin Panel</strong> </h3>
                </div>
                <br>

                <p class="alert-danger text-center">

                <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message', null);
                    }
                ?>

                </p>


                <div class="panel-body">
                <form class="form-horizontal m-t-20" action="{{url('/admin-dashboard')}}" method="post">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control input-lg " type="text" name="admin_email" placeholder="Enter email adddress">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" name="admin_password" placeholder="Enter Password">
                        </div>
                    </div>

        
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                        <div class="col-sm-5 text-right">
                            <a href="register.html">Create an account</a>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>
    	<script src="{{asset('backend/js/jquery.min.js')}}"></script>
        <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('backend/js/waves.js')}}"></script>
        <script src="{{asset('backend/js/wow.min.js')}}"></script>
        <script src="{{asset('backend/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('backend/assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{asset('backend/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('backend/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('backend/assets/jquery-blockui/jquery.blockUI.js')}}"></script>


        <!-- CUSTOM JS -->
        <script src="{{asset('backend/js/jquery.app.js')}}"></script>
	
	</body>
</html>

