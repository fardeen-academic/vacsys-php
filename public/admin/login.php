<?php
    session_start();
    include_once "../php/config.php";
    if(isset($_SESSION['email'])){
        header("Location: dashboard.php");
    }
    if(isset($_POST['email'])){
        
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>window.alert('Invalid email format')
            window.location=window.location</script>";
            }
        $password = $_POST["password"];
        $sql = "SELECT * FROM `admin` WHERE username = '$email'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($password == $row["password"]){
                $_SESSION['email'] = $row['username'];
                header("Location: dashboard.php");
            }
            else{
                echo "<script>window.alert('Email or Password error.')</script>";
            }
        }
        }else
        {
            echo "Error " . $sql . "<br>" . mysqli_error($conn);
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

    <!-- Custom CSS-->
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin Login | VACSYS</title>
</head>
<body>
    

<div class="row vh-100 mw-100 mh-100">
    <div class="h-100 m-0 left-side col-xs-1 text-white"  align="center">
        <h1 class="fw-bolder">VACSYS</h1>
        <br>
        <h5>Free Vaccination Program.</h5>
        <p class="not-admin">Not admin? <a href="/">Click here</a></p>

    </div>

    <div class="h-100 m-25 right-side col-xs-1 text-dark" align="center">
        <div class="container">
            <form action="" method="POST">
                <h3>Welcome back.</h3>
                <h5>Admin Login</h5>
                <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
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