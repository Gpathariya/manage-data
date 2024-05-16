<?php
include ("../config/db.php");
$del_id = $_GET['del_id'];


$sql1 = "SELECT * FROM user WHERE id='$del_id'";
$qry1 = mysqli_query($con, $sql1);

$arr = mysqli_fetch_assoc($qry1);
unlink("../upload-img/" . $arr['image']);

$sql = "DELETE FROM user WHERE `id`='$del_id'";
echo $qry = mysqli_query($con, $sql) or die("Query failed" . mysqli_error($con));

if ($qry) {
    echo "<script>alert('Deleted successfully');window.location.href='dashbord.php'</script>";
    // header("Location: ../signup.php");
}
?>