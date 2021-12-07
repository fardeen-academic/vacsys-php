<?php
session_start();
if(!isset($_SESSION['email'])){
    header('Location: /admin-login.php');
}else{

    include 'dash-main.php';
}