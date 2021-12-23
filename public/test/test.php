<?php
    function output() {
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $number = $_POST['contactNumber'];
        $gender = $_POST['Gender'];
        echo "<p>Name is ".$name."</p> <br>
                <p>Email is ".$email."</p> <br>
                <p>Password is ".$password."</p> <br>
                <p>Contact Number is ".$number."</p> <br>
                <p>Gender is ".$gender."</p> <br>";
    }

    if(isset($_POST['submit'])){
        output();
    }

?>
