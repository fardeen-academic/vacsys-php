<?php
session_start();
include_once "config.php";
$nid = $_POST["nid"];
$date = $_POST["bdate"] ."-". $_POST["bmonth"] ."-". $_POST["byear"];
$query = "SELECT name, birthdate, status FROM member WHERE nid=$nid";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row["birthdate"] == $date){
            $fd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from first_dose WHERE id=$nid"));
            $sd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from second_dose WHERE id=$nid"));            
        echo "<div class='alert alert-success'> <b>Name:</b> ".$row['name']."<br><b>Status:</b> ".$row["status"]." Doses Complete<br>
        <b>First Dose Date:</b> ".$fd['dose_date']."<br><b>Second Dose Date:</b> ".$sd['dose_date']."</div>";
        }else{
            echo "<div class='alert alert-danger'>No Result</div>";      
          }
  }
}else{
    echo "<div class='alert alert-danger'>Information mismatch!</div>";
}
?>