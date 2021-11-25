<?php
require('connection.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
        <link rel="stylesheet"  href="login.css">
    </head>
    <body>
        <div class="container">
            <div class="modal fade" id="login_modal" role="dialog" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header border-bottom-0">
                            <div class="mx-auto">
                                <h4>SignUp</h4>
                            </div>
                            <div>
                                <a href="login_modal.html"><button type="button" class="close" id="close_modal" >&times;</button></a>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column">
                                <form action="login_register.php" method="post">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="fullname" placeholder="Your Name" name="fullname" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" id="Signup_email" placeholder="Your Email Address" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" id="login_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="New Password" id="password" required >
                                        <input type="checkbox" onclick="show()">Show password
                                    </div>
                                    <div id="message">
                                        <h6>Password must contain the following:</h6>
                                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                        <p id="number" class="invalid">A <b>number</b></p>
                                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Re-enter Password</label>
                                        <input type="password" class="form-control"  placeholder="Confirm Password" id="password_2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required >
                                        <div id="message1">
                                           <!-- <p id="same" class="invalid">Password match</p>-->
                                        </div>
                                    </div>
                                        
                                        <br>
                                    <button type="submit" class="btn btn-info btn-block btn-round" name="register">SignUp</button>
                                </form>
                                <div class="text-center" id="or"><p><b>OR</b></p></div>
                                <div class="text-center text-muted delimiter">Use a social network</div>
                                <div class="d-flex justify-content-center social-buttons">
                                    <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="bottom" title="Google" id="ggl">
                                        <i class="fab fa-google"></i>
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="bottom" title="Twitter" id="twt">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="bottom" title="Facebook" id="fac">
                                        <i class="fab fa-facebook"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <div class="signup-section">have an account<a href="login_modal.html"> Login</a></div>
                        </div>
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