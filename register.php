<?php 

// getting connect & function login

require('dbcon.php');
require('function.php');

if(!login()){

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome bootstrap and custom css -->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loginreg.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8 col-md-8 col-12">
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="#" method="post" id="register-form">
                            <h3 class="card-text text-center text-dark mb-5">Register</h3>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="username" id="username" class="form-control rounded-right" placeholder="Username">
                                    <div class="invalid-feedback" id="invalid-username"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="email" id="email" class="form-control rounded-right" placeholder="Email Address">
                                    <div class="invalid-feedback" id="invalid-email"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-key"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control rounded-right" placeholder="Password">
                                    <div class="invalid-feedback" id="invalid-password"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-key"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="confirm-password" id="confirm-password" class="form-control rounded-right" placeholder="Confirm Password">
                                    <div class="invalid-feedback" id="invalid-confirm-password"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary btn-block mt-5" onclick="register()">Register</button>
                            </div>
                            <hr>
                            <div class="form-group text-center">
                                <h6>Already have an account ? <a href="login">Sign In</a></h6>
                            </div>
                            <div class="form-group text-center d-flex justify-content-center">
                                <div class="spinner-border text-primary" role="status" id="loading" style="display: none;">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery proper js bootstrap font awesome and master js -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/all.js"></script>
    <script src="js/master.js"></script>
</body>
</html>

<?php 

}else{
    header('location:index.php');
}

?>