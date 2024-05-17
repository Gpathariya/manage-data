<?php
session_start();
include ("includes/header.php");
include ("config/db.php");

include ('smtp/PHPMailerAutoload.php');

function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "gr4456812@gmail.com";
    $mail->Password = "cjtrjisbpnjkkafx";
    $mail->SetFrom("gr4456812@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );

    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        return '<script>alert("Send successfully")</script>';
    }
}

if (isset($_POST['forgotPass'])) {
    // Step 1: Generate and Send OTP
    $email = $_POST['email'];
    $otp = mt_rand(1000, 9999);
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_timestamp'] = time();
    $msg = "Your OTP is: " . $otp . ". Do not share this OTP with anyone. Your OTP will expire within 2 minutes";
    $sub = "Password Reset OTP";

    // Send OTP to the user's email
    // Example: mail($email, $sub, $msg);
    smtp_mailer($email, $sub, $msg);
    $sql = "INSERT INTO forgot_password(email,token) VALUES ('$email','$otp')";
    $qry = mysqli_query($con, $sql);
    if ($qry) {
        $_SESSION['reset_email'] = $email;
        $_SESSION['otp'] = $otp;
        header("Location: enter-otp.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
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

                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email" />
                    </div>
                    <input type="submit" class="btn btn-primary" name="forgotPass" value="Send" />
                    <a href="login.php" class="fs-6 reg-btn-link ms-lg-5">login</a>
            </div>
            <!-- 

                    <a href="" class="fs-6 reg-btn-link ms-lg-5">Forgot Password</a> -->
            </form>

        </div>
    </div>


    </div>
</body>

</html>
<?php
// }
?>