<?php
include ("../config/db.php");
$uid = $_GET['uid'];
$sql = "SELECT * FROM user WHERE id='$uid'";
$qry = mysqli_query($con, $sql);
if ($qry) {
  while ($arr = mysqli_fetch_assoc($qry)) {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Update-user</title>
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/style.css" />
    </head>

    <body class="update_page">
      <div class="container-fluid form_container">
        <div class="row form_row p-4">
          <div class="col form_col">
            <div class="container">
              <div class="row">
                <div class="col-md-10">
                  <h2>Update your Account</h2>
                </div>
              </div>
            </div>

            <?php

            if (isset($_POST['update'])) {
              $name = $_POST['name'];
              $email = $_POST['email'];
              $phone = $_POST['phone'];
              $old_img = $_POST['old_img'];
              $new_img = $_FILES['new_img'];
              $address = $_POST['address'];
              $password = $_POST['password'];
              $con_password = $_POST['con_password'];


              $file_name = $_FILES['new_img']['name'];
              $filesize = $_FILES['new_img']['size'];
              $file_tmp = $_FILES['new_img']['tmp_name'];
              $filetype = $_FILES['new_img']['type'];
              $allowextension = array("jpg", "gif", "text", "png", );
              $filextension = pathinfo($file_name, PATHINFO_EXTENSION);

              // old image remove function
              function removeold_img($old_img)
              {
                if (file_exists("../upload-img/" . $old_img)) {
                  unlink("../upload-img/" . $old_img);
                }
              }


              if (empty($name) || empty($phone) || empty($email)) {
                echo "<script>alert('Name, Email And Phone are required fields');</script>";
              }
              //  elseif (!$password == $con_passwoerd) {
              //   echo "<script>alert('Passwords do not match');</script>";
              // }
              elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
                echo "<script>alert('Inavalid Phone number. Please give valid number');</script>";
              }
              // elseif (!in_array($filextension, $allowextension)) {
              //   echo "<script>alert('This File Extension is not allowed);</script>";
              // }
              else {
                if ($_FILES['new_img']['error'] != 0) {
                  $old_img = $_POST['old_img'];
                  // echo "<script>alert('All Set');</script>";
                  $sql = "UPDATE user SET `name`='$name',`email`='$email',`phone`='$phone',`image`='$old_img',`address`='$address',`password`='$password',`con_password`='$con_password' WHERE id='$uid'";
                  $qry = mysqli_query($con, $sql) or die("Update query failed" . mysqli_error($con));

                  if ($qry) {
                    echo "<script>alert('Your Account has been update Successfully');window.location.href='index.php'</script>";
                  } else {
                    echo "<script>alert('Something went wrong');window.location.href='update-user.php'</script>" . mysqli_error($con);
                  }
                } else {
                  $new_filename = time() . "-" . basename($file_name);
                  move_uploaded_file($file_tmp, "../upload-img/" . $new_filename);

                  $sql = "UPDATE user SET `name`='$name',`email`='$email',`phone`='$phone',`image`='$new_filename',`address`='$address',`password`='$password',`con_password`='$con_password' WHERE id='$uid'";

                  $qry = mysqli_query($con, $sql) or die("Update query failed" . mysqli_error($con));

                  if ($qry) {
                    echo "<script>alert('Your Account has been update Successfully');window.location.href='dashbord.php'</script>";
                    removeold_img($targetdir . $old_img);
                  } else {
                    echo "<script>alert('Something went wrong');window.location.href='update.php'</script>" . mysqli_error($con);
                  }
                }
              }
            }
            ?>

            <form class="sign_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
              <div class="container-fluid">
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="name" value="<?php echo $arr['name']; ?>" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                  value="<?php echo $arr['email']; ?>" />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone"
                  value="<?php echo $arr['phone']; ?>" />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile</label>
                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="new_img"
                  value="<?php echo $arr['image']; ?>" />
                <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                  name="old_img" value="<?php echo $arr['image']; ?>" />
                <img src="../upload-img/<?php echo $arr['image']; ?>" alt="" height="90px" width="100px">
              </div>
              <label for="address" class="form-label">Address</label>
              <textarea name="address" id="" class="form-control"><?php echo $arr['address']; ?></textarea>

              <!-- <label for="role" class="form-label"></label>
                    <select name="role" id="" class="form-select">
                        <Option value="">Select Role</Option>
                        <Option value="user">User</Option>
                        <Option value="admin">Admin</Option>
                    </select> -->
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control pass_input" id="exampleInputPassword1" name="password"
                  value="<?php echo $arr['password']; ?>" />

                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                  <label class="form-check-label" for="exampleCheck1">Show Password</label>
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="con_password"
                  value="<?php echo $arr['con_password']; ?>" />
              </div>
              <input type="submit" class="btn btn-primary" name="update" value="Submit" />
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
    <?php

  }
}
?>