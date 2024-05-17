<?php
include ("config/db.php");
include ("includes/header.php");
?>


<?php

session_start();

$opt_valid_time = 2 * 60;
if (isset($_POST['entOtp'])) {
    $otpEntered = $_POST['verifyotp'];

    $stored_otp = $_SESSION['otp'];
    $otp_timestamp = $_SESSION['otp_timestamp'];

    $qry = mysqli_query($con, "SELECT * FROM forgot_password WHERE token = '$otpEntered' ");
    $arr = mysqli_fetch_assoc($qry);
    if ($arr) {
        if ($_SESSION['otp'] == $otpEntered) {
            // OTP verification successful
            //is condition ka mtlb h ki kitna time passed ho chuka h jabse otp generated hui h tabse
            //The purpose of this calculation is to determine how much time has passed since the OTP was generated. 
            if ((time() - $otp_timestamp) <= $opt_valid_time) {
                $_SESSION['reset_email'] = $arr['email'];
                echo "<script>alert('your OTP is verified Now');window.location.href='new-password.php'</script>";
            } else {
                echo "<script>alert('OTP expired');window.location.href='enter-otp.php'</script>";
            }
        } else {
            // OTP verification failed            
            echo "<script>alert('Invalid OTP. Please try again');window.location.href='enter-otp.php'</script>";
        }


    }
    // $qry = mysqli_query($con, "SELECT * FROM forgot_password WHERE token = '$otpEntered' ");
    // $arr = mysqli_fetch_assoc($qry);
    // if ($arr) {
    //     if ($_SESSION['otp'] == $otpEntered) {
    //         // OTP verification successful
    //         $_SESSION['reset_email'] = $arr['email'];
    //         echo "<script>alert('your OTP is verified Now');window.location.href='new-password.php'</script>";
    //     } else {
    //         // OTP verification failed            
    //         echo "<script>alert('Invalid OTP. Please try again');window.location.href='enter-otp.php'</script>";
    //     }
    // }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Enter OTP</title>
    <link rel="stylesheet" href="css/bootstrap_min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="login_page">
    <div class="container-fluid">
        <div class="row">
            <div class="col login_col_form">
                <form action="" method="post" class="login_form w-md-100">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Enter OTP</label>
                        <input type="text" class="form-control" name="verifyotp" />
                    </div>
                    <input type="submit" class="btn btn-primary" name="entOtp" value="Enter OTP" />
                    <a href="login.php" class="fs-6 reg-btn-link ms-lg-4">login</a>
                    <a href="forgot-password.php" class="fs-6 reg-btn-link ms-lg-2">Resend Otp</a>
            </div>
            </form>

        </div>
    </div>
    </div>
</body>

</html>