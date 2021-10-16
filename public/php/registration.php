<?php
    session_start();
    include_once "config.php";
    $nid = $_POST["nid"];
    $date = $_POST["bdate"] ."-". $_POST["bmonth"] ."-". $_POST["byear"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $venue = $_POST["venue"];
    $sql = "INSERT INTO member (nid, birthdate, name, phone, venue)
    VALUES ('{$nid}', '{$date}', '{$name}', '{$phone}', '{$venue}')";
    if (mysqli_query($conn, $sql)){
        header("Location: ../success.php");
exit();
    }
    else{
        echo "Error " . $sql . "<br>" . mysqli_error($conn);
        header("Location: ../success.php");
    }
    mysqli_close($conn);
?>