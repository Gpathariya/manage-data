<?php
session_start();
include ("includes/header.php");
include ("config/db.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];



    // rjowaxyqokvudvin

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>
        <link rel="stylesheet" href="css/bootstrap_min.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>

    <body class="login_page">
        <div class="container-fluid">
            <div class="row">
                <div class="col login_col_form">
                    <form action="send-password-reset.php" method="post" class="login_form w-md-100">
                        <div class="mb-3">

                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="email" />
                        </div>
                        <!-- <div class="mb-3">

                        <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="contact" />
                    </div> -->
                        <!-- <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control pass_input" id="exampleInputPassword1"
                            name="password" />

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                            <label class="form-check-label" for="exampleCheck1">Show Password</label>
                        </div> -->
                        <input type="submit" class="btn btn-primary" name="forgotPass" value="Send" />
                        <a href="login.php" class="fs-6 reg-btn-link ms-lg-5">login</a>
                </div>

                <!-- 

                    <a href="" class="fs-6 reg-btn-link ms-lg-5">Forgot Password</a> -->

                <div class="container">
                    <div class="row">
                    </div>
                </div>
                </form>

            </div>
        </div>


        </div>
    </body>

    </html>
    <?php
}
?>