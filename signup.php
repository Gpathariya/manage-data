<?php
include ("config/db.php");
include ("includes/header.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $profile = $_FILES['profile'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];


    $filename = $_FILES['profile']['name'];
    $file_size = $_FILES['profile']['size'];
    $file_tmp = $_FILES['profile']['tmp_name'];
    $file_type = $_FILES['profile']['type'];
    $allowext = array("jpg", "gif", "text", "png", "pdf", "jpeg");
    $fileextension = pathinfo($filename, PATHINFO_EXTENSION);

    // $errors = [];
    if (strlen($password) < 5) {
        // $error[] = "Password length is too short";
        // $errors[] = "Password must be at least 5 characters long.";
        echo "<script>alert('Password must be at least 5 characters long');window.location.href='signup.php'</script>";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        // $errors[] = "Password must include at least  one Uppercase letter";
        echo "<script>alert('Password must include at least  one Uppercase letter');window.location.href='signup.php'</script>";
    } elseif (!preg_match("/[a-z]/", $password)) {
        // $errors[] = "Password must include at least  one lowercase letter";
        echo "<script>alert('Password must include at least  one lowercase letter');window.location.href='signup.php'</script>";
    } elseif (!preg_match("/[0-9]/", $password)) {
        // $errors[] = "Password must include at least  one number";
        echo "<script>alert('Password must include at least  one number');window.location.href='signup.php'</script>";
    } elseif (!preg_match("/[\W_]/", $password)) {
        //       /[\W_]/
        // $errors[] = "Password must include at least one special character.";
        echo "<script>alert('Password must include at least one special character.');window.location.href='signup.php'</script>";
    } else {

        if (empty($email) || empty($phone) || empty($name) || empty($password)) {
            echo "<script>alert('Name, Email ,Phone And Password are required fields');window.location.href='signup.php'</script>";
        } elseif (!$password == $con_password) {
            echo "<script>alert('Passwords do not match');window.location.href='signup.php'</script>";
        } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
            echo "<script>alert('Inavalid Phone number. Please give valid number');window.location.href='signup.php'</script>";
        } elseif (!in_array($fileextension, $allowext)) {
            echo "<script>alert('This File Extension is not allowed);window.location.href='signup.php'</script>";
        }

        if (empty($_FILES['profile']['name'])) {
            $defaultimg = 'img/default.png';
            $new_filename = time() . "-" . basename($defaultimg);
            copy($defaultimg, "upload-img/" . $new_filename);
            $sql = "INSERT INTO `user` (name, email, phone, image, address, password, con_password,role) VALUES ('$name', '$email','$phone', '$new_filename', '$address', '$password', '$con_password','1')";
            $qry = mysqli_query($con, $sql) or die("query failed" . mysqli_error($con));

            if ($qry) {
                echo "<script>alert('Your Data has been Inserted Successfully');window.location.href='login.php'</script>";
            } else {
                echo "<script>alert('Something went wrong');window.location.href='signup.php'</script>" . mysqli_error($con);
            }
        } else {
            $new_filename = time() . "-" . basename($filename);
            move_uploaded_file($file_tmp, "upload-img/" . $new_filename);
            $sql = "INSERT INTO `user` (name, email, phone, image, address, password, con_password,role) VALUES ('$name', '$email','$phone', '$new_filename', '$address', '$password', '$con_password','1')";
            $qry = mysqli_query($con, $sql) or die("query failed" . mysqli_error($con));
            if ($qry) {
                echo "<script>alert('Your Data has been Inserted Successfully');window.location.href='login.php'</script>";
            } else {
                echo "<script>alert('Something went wrong');window.location.href='signup.php'</script>" . mysqli_error($con);
            }
        }
    }
}
?>
<div class="container-fluid form_container signup_page">
    <div class="row form_row p-4">
        <div class="col form_col">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <h2>Register here</h2>
                    </div>
                    <div class="col-md-2"><a href="login.php" class="fs-4 login-btn-link">login</a></div>
                </div>
            </div>
            <form class="sign_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email" />

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="phone" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Profile</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="profile" />
                </div>
                <label for="address" class="form-label">Address</label>
                <textarea name="address" id="" class="form-control"></textarea>

                <!-- <label for="role" class="form-label"></label>
                <select name="role" id="" class="form-select">
                    <Option value="">Select Role</Option>
                    <Option value="user">User</Option>
                    <Option value="admin">Admin</Option>
                </select> -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control pass_input" id="exampleInputPassword1" name="password" />

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                        <label class="form-check-label" for="exampleCheck1">Show Password</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="con_password" />
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
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