<?php
    session_start();
    include_once "config.php";
    $nid = $_POST["nid"];

    $fdose = "".$_POST["fdate"] ."_". $_POST["fmonth"] ."_". $_POST["fyear"]."";
    $fdosedone = $_POST["fdosedone"];
    $sdose = "".$_POST["sdate"] ."_". $_POST["smonth"] ."_". $_POST["syear"]."";
    $sdosedone = $_POST["sdosedone"];

    $fd = "UPDATE first_dose SET dose_date='$fdose' WHERE id=$nid";
    $fdone = "UPDATE first_dose SET dose_done='$fdosedone' WHERE id=$nid";
    $sd = "UPDATE second_dose SET dose_date='$sdose' WHERE id=$nid";
    $sdone = "UPDATE second_dose SET dose_done='$sdosedone' WHERE id=$nid";
    
    if(mysqli_query($conn, $fd) and mysqli_query($conn, $fd) and mysqli_query($conn, $sd) and mysqli_query($conn, $sd) and mysqli_query($conn, $sdone)){
      echo "<div class='alert alert-success'>Updated Successfully</div>"; 
    }
    else{
      echo mysqli_error($conn);
    }
    
    if($fdosedone == '1'){
      mysqli_query($conn, "UPDATE member SET status='1' WHERE nid=$nid");
    }else if($fdosedone == '0' and $sdosedone=='0'){
      mysqli_query($conn, "UPDATE member SET status='0' WHERE nid=$nid");
    }
    if($sdosedone == '1'){
      mysqli_query($conn, "UPDATE member SET status='2' WHERE nid=$nid");
    }
    mysqli_close($conn);
?>