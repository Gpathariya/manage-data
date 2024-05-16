<?php
session_start();
include ("includes/header.php");
include ("config/db.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "<script>alert('All fields are required');</script>";
        // echo "<script>alert('All fields are required');window.location.href='login.php'</script>";
    } else {
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $qry = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($qry);

        if ($rows > 0) {
            while ($arr = mysqli_fetch_assoc($qry)) {
                $_SESSION['id'] = $arr['id'];
                $_SESSION['name'] = $arr['name'];
                $_SESSION['email'] = $arr['email'];
                $_SESSION['img'] = $arr['image'];
                $_SESSION['password'] = $arr['password'];
                $_SESSION['role'] = $arr['role'];
                if ($_SESSION['role'] == 0) {
                    header("location:admin/dashbord.php");
                } else {
                    header("location:user/index.php");
                }
            }
        } else {
            echo "<script>alert('Wrong Information');window.location.href='login.php'</script>";
        }
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
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email" />
                    </div>
                    <!-- <div class="mb-3">

                        <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="contact" />
                    </div> -->
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control pass_input" id="exampleInputPassword1"
                            name="password" />

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                            <label class="form-check-label" for="exampleCheck1">Show Password</label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="login" value="Login" />

                    <a href="signup.php" class="fs-6 reg-btn-link ms-lg-5">Want to sign up ?</a>

                    <a href="" class="fs-6 reg-btn-link ms-lg-5">Forgot Password</a>

                    <div class="container">
                        <div class="row">
                            <!-- <div class="col"></div> -->




                        </div>
                    </div>
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