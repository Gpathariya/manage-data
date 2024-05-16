<?php
session_start();
// error_reporting(0);
include ("../config/db.php");
if ($_SESSION['role'] == "0") {
  $id = $_SESSION['id'];
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $img = $_SESSION['img'];
  $password = $_SESSION['password'];
  $role = $_SESSION['role'];
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Project</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <header>
      <div class="container-fluid">
        <div class="row p-2 navbar_row">
          <div class="col-lg-3">
            <img src="img/logo-png-veeaar-1.png" alt="" class="logo" />
          </div>
          <div class="col-lg-3 pt-lg-3 ps-5">
            <h2 class="wlcmuser">
              Welcome :
              <?php echo $_SESSION['name']; ?>
            </h2>
          </div>
          <div class="col-lg-3 text-end">
            <div class="pt-lg-2">
              <a href="../index.php" class="logoutBtn fw-bold">Visit Website</a>
            </div>
          </div>
          <div class="col-lg-3 text-end">
            <div class="pt-lg-2">
              <img src="../upload-img/<?php echo $_SESSION['img']; ?>" alt="" class="me-lg-4 profile_img" />
              <a href="../logout.php" class="fw-bold logoutBtn">Logout</a>
            </div>
          </div>
        </div>
      </div>
      </div>
    </header>
    <div class="container">
      <div class="row my-3">
        <div class="col text-end">
          <h3><a href="../signup.php">Add User</a></h3>
        </div>
      </div>
    </div>
    <section>
      <div class="container">
        <div class="row">
          <div class="col">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Profile</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $costum_id = 1;
                $sql = "SELECT * FROM user ORDER BY id DESC";
                $qry = mysqli_query($con, $sql);
                if ($qry) {
                  while ($arr = mysqli_fetch_assoc($qry)) {

                    ?>

                    <tr>
                      <td><?php echo $costum_id; ?></td>
                      <td><?php echo $arr['name']; ?></td>
                      <td><?php echo $arr['email']; ?></td>
                      <td><?php echo $arr['phone']; ?></td>
                      <td><?php echo $arr['address']; ?></td>
                      <td><img src="../upload-img/<?php echo $arr['image']; ?>" alt="" height="50px" width="50px"></td>
                      <td>
                        <!-- <button type="button" class="btn update_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                          Update
                        </button> -->
                        <a href="update.php?uid=<?php echo $arr['id']; ?>" class="btn update_btn">Update</a>
                      </td>
                      <td>
                        <a href="delete.php?del_id=<?php echo $arr['id']; ?>" class="btn delete_btn">Delete</a>
                        <!-- <button type="button" class="btn delete_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                          Delete
                        </button> -->
                      </td>
                    </tr>
                    <?php
                    $costum_id++;
                  }
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Update POPUP modal -->
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">
                Confirmation
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-danger fw-medium">
              Are you sure ? Do you want to Update your account ?
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">
                Close
              </a>
              <a href="update-user.php<?php echo $arr['id']; ?>" class="btn update_btn w-25">Update</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Update POPUP modal  End-->

      <!-- POPUP modal Delete -->
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">
                Confirmation
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-danger fw-medium">
              Are you sure ? Do you want to delete your account ?
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">
                Close
              </a>
              <a href="delete-user.php?del_id=<?php echo $arr['id']; ?>" class="btn delete_btn w-25">Delete</a>
            </div>
          </div>
        </div>
      </div>
      <!-- POPUP modal  End-->

    </section>
    <div class="container-fluid footer">
      <div class="row p-2">
        <div class="col text-center pt-1">
          <h6>@copyright 2024 Project || Powered By Gaurav</h6>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"></script>
  </body>

  </html>
  <?php
} else {
  header("location:../login.php");
}
?>