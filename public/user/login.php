<?php
    session_start();
    include_once "../php/config.php";
    if(isset($_SESSION['nid'])){
        header("Location: dashboard.php");
    }
    if(isset($_POST['nid'])){
        
        $nid = $_POST["nid"];
        
        $password = $_POST["password"];
        $sql = "SELECT * FROM `user` WHERE nid = '$nid'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($password == $row["pass"]){
                $_SESSION['nid'] = $_POST['nid'];
                echo "<script>window.alert('NID: ".$_SESSION['nid'].".')</script>";
                header("Location: dashboard.php");
            }
            else{
                echo "<script>window.alert('NID or Password error.')</script>";
            }
        }
        }else
        {
            echo "<script>window.alert('NID or Password error.')</script>";
        }
        mysqli_close($conn);
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
    <link rel="stylesheet" href="../css/user-login.css">
    <title>User Login | VACSYS</title>
</head>
<body>
    

<div class="row vh-100 mw-100 mh-100">
    <div class="h-100 m-0 left-side col-xs-1 text-white"  align="center">
        <h1 class="fw-bolder">VACSYS</h1>
        <br>
        <h5>Free Vaccination Program.</h5>
        <p class="not-admin">Not Registered? <a href="/register.php">Click here</a></p>

    </div>

    <div class="h-100 m-25 right-side col-xs-1 text-dark" align="center">
        <div class="container">
            <form action="" method="POST">
                <h3>Welcome back.</h3>
                <h5>Admin Login</h5>
                <div class="form-floating mb-3">
                <input type="number" class="form-control" name="nid" id="nid" placeholder="0000000000">
                <label for="floatingInput">NID number</label>
                </div>
                <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating">
                    <button class="btn btn-primary" type="submit">Log in</button>
                </div>
                <p>Trouble logging in? <a href="#">Click here.</a></p>
            </form>
        </div>
    </div>

</div>

</body>
</html>