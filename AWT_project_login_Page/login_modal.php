<html>
    <head>
        <link rel="stylesheet"  href="login.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Login button -->
        <div class="container">
            <button type="button" data-toggle="modal" data-target="#login_modal" class="btn btn-info btn-round">login</button>
        
        <!-- Modal -->
        <div class="modal fade" id="login_modal" role="dialog" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <div class="mx-auto">
                            <h1>Login/SignUp</h1>
                        </div>
                        <div><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column text-center">
                            <form id="loginform" action="login_register.php" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="login_email" placeholder="Your Email Address" name="email" required>
                                    <div class="invalid-feedback">Please enter your username or email</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="login_password" placeholder="Password" name="passwd" required >
                                    <div class="invalid-feedback">Please enter a password</div>
                                    <span class="pull-right"><a href="forgetpass.php" target="blank">Forget password?</a></span>
                                    <span class="pull-left"><input type="checkbox" onclick="show()">Show password</span>
                                </div><br>
                                <button type="submit" class="btn btn-info btn-block btn-round" id="mylogin" name="Mylogin">Login</button>
                            </form>
                            <div class="divider text-center" id="or"><p>OR</p></div>
                            <div class="text-center text-muted delimiter">  use a social network</div>
                            <div class="d-flex justify-content-center social-buttons" id="socialm">
                                <button type="button" id="ggl" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="bottom" title="Google">
                                    <i class="fab fa-google"></i>
                                </button>
                                <button type="button" id="twt" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="bottom" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button type="button" id="fac" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="bottom" title="Facebook">
                                    <i class="fab fa-facebook"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <div class="signup-section">Don't have an account? <a href="signup.php" target="blank">SignUp</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src="login.js"></script>
    
    </body>
</html>