<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
        
    </head>
    <body>
        <div class="container">
            <div class="modal fade" id="login_modal" role="dialog" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <div class="mx-auto">
                                <h4>Change Your Password</h4>
                            </div>
                            <div>
                                <a href="login_modal.html"><button type="button" class="close" id="close_modal" >&times;</button></a>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column">
                                <form id="Confirmation" action="forgot_password.php" method="post">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" id="Signup_email" placeholder="Your Email Address" name="email" required>
                                    </div>
                                   
                                    <button type="submit" data-toggle="modal" id="Confirmationbtn" data-target="#Confirm_modal" class="btn btn-info btn-block btn-round" name="send-reset-link">Confirm</button>
                                </form>
    
                        <div class="modal-footer d-flex justify-content-center">
                            <div class="signup-section">have an account<a href="login_modal.html"> Login</a></div>
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