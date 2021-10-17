<?php
session_start();
include_once "config.php";
$sql = "SELECT * FROM member WHERE status='2'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      $nid = $row['nid'];
      $fd = "SELECT * FROM first_dose WHERE id=$nid";
      $first_dose = mysqli_fetch_assoc(mysqli_query($conn, $fd));
      $sd = "SELECT * FROM second_dose WHERE id=$nid";
      $second_dose = mysqli_fetch_assoc(mysqli_query($conn, $sd));
      $vid = $row['venue'];
      $venue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM venue WHERE id='$vid'"));
      

    echo "<tr><td>".$row['nid']."</td><td>".$row['name']."</td><td>".$row['phone']."</td><td>".$row['status'].
    "</td><td><button class='btn updatemodal' id='updatemodal' data-nid='".$row['nid']."' data-name='".$row['name'].
    "'data-fdose='".$first_dose['dose_date']."'data-fdosedone='".$first_dose['dose_done'].
    "'data-sdose='".$second_dose['dose_date']."'data-sdosedone='".$second_dose['dose_done'].
    "'data-venue='".$venue['name']."'data-status='".$row['status'].
    "'><i class='fas fa-edit'></i></button></td></tr>";
  }
}
else{
    echo "Row 0";
}
mysqli_close($conn);
?>

<?php
include "dash-main.php";
?>