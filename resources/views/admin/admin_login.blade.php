
<!DOCTYPE html>

<head>
    <title>Admin Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- Bootstrap cdn -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />

    <!-- Custom CSS -->
    <link href="{{ asset('backend/css_admin/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('backend/css_admin/style-responsive.css') }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
    <script src="https://kit.fontawesome.com/adad512387.js" crossorigin="anonymous"></script>
    <!-- //font-awesome icons -->
    <script src="{{ asset('backend/js_admin/jquery-3.6.0.min.js') }}"></script>
</head>
<body style="background: url({{ asset('/backend/images/bg.jpg')}}) no-repeat 0px 0px;	background-size:cover;">
    <div class="log-w3" >
        <div class="w3layouts-main">
            <h2>Sign In Now</h2>
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class = "text-alert">',$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <form action="{{URL::to('/admin-dashboard') }}" method="post">
                {{ csrf_field() }}
                <input type="text"  class="ggg" name="admin_email" placeholder="Your Email" required="">
                <input type="password" class="ggg" name="admin_password" placeholder="Your Password" required="">
                <span><input type="checkbox" />Remember Me</span>
                <h6><a href="#">Forgot Password?</a></h6>
                <div class="clearfix"></div>
                <input type="submit" value="Sign In" name="login">
            </form>
            {{-- <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p> --}}
        </div>
    </div>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <!-- font Awesome cdn -->
    <script src="https://kit.fontawesome.com/adad512387.js" crossorigin="anonymous"></script>
    <script src="{{ asset('backend/js_admin/scripts.js') }}"></script>

</body>

</html>
