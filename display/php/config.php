<?php
    $conn = mysqli_connect('localhost', 'fardeen', 'iamfardeen', 'vacsys');
    if(!$conn){
        echo mysqli_connect_error();
    }

?>