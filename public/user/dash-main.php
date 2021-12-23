<?php
session_start();
include_once "../php/config.php";
if(!isset($_SESSION['nid'])){
    header("Location: login.php");
}
//user info from sql

$nid = $_SESSION['nid'];
$sql = "SELECT * FROM `member` WHERE nid = $nid";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $name = $row["name"];
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Custom CSS-->
    <link rel="stylesheet" href="../css/user-dash.css">
    <title>Document</title>
</head>
<body>
    <div class="row vh-100 mw-100 mh-100 ">
        <div class="left text-white d-print-none">
            <div class="profile">
                <img src="../images/avatar.jpeg" width="22%" alt="">
                <p id="name"><?php echo $name; ?></p>
                <p id="nid">NID: <?php echo $nid; ?></p>
            </div>

            <div class="menu">
                <a href="dashboard.php"><i class="fas fa-th-large"></i>Dashboard</a>
                <a href="profile.php"><i class="fas fa-user"></i>Profile</a>
                <a href="card.php"><i class="far fa-address-card"></i>Vaccine Card</a>
                <a href="certificate.php"><i class="fas fa-certificate"></i>Certificate</a>
                <a id="logout" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
            
        </div>

