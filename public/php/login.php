<?php
    session_start();
    include_once "config.php";
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT `password` FROM `admin` WHERE username = 'admin@demo.com'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($password == $row["password"]){
            header("Location: ../dashboard.php");
        }
        else{
            echo "Email or Password error.";
        }
    }
    }else
    {
        //header("Location: ../dashboard.php");
        echo "Error " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>