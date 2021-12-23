<?php
    session_start();
    include_once "config.php";
    $nid = $_POST["nid"];
    $date = $_POST["bdate"] ."-". $_POST["bmonth"] ."-". $_POST["byear"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $venue = $_POST["venue"];

    $hbp = $_POST["highbp"];
    $diabetes = $_POST["diabetes"];
    $kidney = $_POST["kidney"];
    $cancer = $_POST["cancer"];
    $covid = $_POST["covid"];

    $pass = $_POST["password"];

    $sql = "INSERT INTO member (nid, birthdate, name, phone, venue)
    VALUES ('{$nid}', '{$date}', '{$name}', '{$phone}', '{$venue}')";
    if (mysqli_query($conn, $sql)){
        $fd = "INSERT INTO first_dose (id, dose_done) VALUES ('{$nid}', '0')";
        $sd = "INSERT INTO second_dose (id, dose_done) VALUES ('{$nid}', '0')";
        $health = "INSERT INTO health (nid, highbp, diabetes, kidney, cancer, covid) VALUES ('{$nid}', '{$hbp}', '{$diabetes}', '{$kidney}', '{$cancer}', '{$covid}')";
        $pass = "INSERT INTO user (nid, pass) VALUES ('{$nid}', '{$pass}')";
        mysqli_query($conn, $fd);
        mysqli_query($conn, $sd);
        mysqli_query($conn, $health);
        mysqli_query($conn, $pass);
        header("Location: ../success.php");
        exit();
    }
    else{
        echo "<p>Error " . $sql . "<br>" . mysqli_error($conn)."</p>";
        
    }
    mysqli_close($conn);
?>