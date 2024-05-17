<?php
session_start();
include ("includes/header.php");
include ("config/db.php");
// echo $_SESSION['reset_email'];
if (isset($_POST['changepass'])) {
    // Step 3: Reset Password
    $new_password = $_POST['new_password'];
    // Update the user's password in the database

    $sql = "UPDATE user SET password = '$new_password' WHERE email = '{$_SESSION['reset_email']}'";
    // Execute the SQL statement
    if (mysqli_query($con, $sql)) {
        unset($_SESSION['reset_email']);
        unset($_SESSION['otp']);
        echo "<script>alert('Now you can login. Thank you 🙌');window.location.href='login.php'</script>";
    }
}

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
                <form action="" method="post" class="login_form w-md-100">
                    <div class="mb-3">
                        <!-- <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email" />
                    </div> -->
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">New Password</label>
                            <input type="password" class="form-control pass_input" id="exampleInputPassword1"
                                name="new_password" />

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                <label class="form-check-label" for="exampleCheck1">Show Password</label>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm new Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                name="con_password" />
                        </div>
                        <input type="submit" class="btn btn-primary" name="changepass" value="Change Password" />
                        <!-- <a href="signup.php" class="fs-6 reg-btn-link ms-lg-5">Want to sign up ?</a>

                        <a href="forgot-password.php" class="fs-6 reg-btn-link ms-lg-5">Forgot Password</a> -->
                </form>

            </div>
        </div>


    </div>

    <script>
        let checkId = document.getElementById("exampleCheck1");
        let pass_inp = document.getElementById("exampleInputPassword1");

        checkId.addEventListener("click", () => {
            if (pass_inp.type == "password") {
                pass_inp.type = "text";
            } else {
                pass_inp.type = "password";
            }
        });

    </script>
</body>

</html>