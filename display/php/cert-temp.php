<?php
session_start();
include_once "config.php";
$nid = $_POST["nid"];
$date = $_POST["bdate"] ."-". $_POST["bmonth"] ."-". $_POST["byear"];
$query = "SELECT * FROM member WHERE nid=$nid";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row["birthdate"] == $date and $row['status'] == 2){
            $v = $row['venue'];
            $fd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from first_dose WHERE id=$nid"));
            $sd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from second_dose WHERE id=$nid"));
            $venue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from venue WHERE id='$v'"));            
            echo"
            <button class='btn btn-success' id='download-v-card-btn' onclick='window.print()'>Download Certificate</button> 
            <nav class='navbar navbar-expand-md navbar-light'>
            <a class='title navbar-brand disabled'>VACSYS</a>
            <div class='navbar-link ms-auto'>
                <ul class='navbar-nav text-center'>
                <li class='nav-item'><aclass='nav-link disabled'><i class='fas fa-user'></i></a></li>
                </ul>
            </div>
            </nav>
            <div class='text-center'>
            <h5><b>Covid-19 Vaccination Certificate</b></h5>
            <br>
            <p>This is to certify that the below mentioned person has completed two doses of Covid-19 vaccination.</p>
            </div>
            
            <div style='border: 1; margin:3% 2%;'>
            <div class='mb-4 row d-flex justify-content-center'>
                    <label for='staticEmail' class='col-sm-2 col-form-label'>NID</label>
                    <div class='col-sm-6'>
                    <input type='text' name='nid' id='nid' readonly class='form-control form_data' value='".$nid."'>
                    </div>
                </div>
                <div class='mb-4 row d-flex justify-content-center'>
                    <label for='staticEmail' class='col-sm-2 col-form-label'>Name</label>
                    <div class='col-sm-6'>
                    <input type='text' name='nid' id='nid' readonly class='form-control form_data' value='".$row['name']."'>
                    </div>
                </div>
                <div class='mb-4 row d-flex justify-content-center'>
                    <label for='staticEmail' class='col-sm-2 col-form-label'>Date of Birth</label>
                    <div class='col-sm-6'>
                    <input type='text' name='nid' id='nid' readonly class='form-control form_data' value='".$date."'>
                    </div>
                </div>
                <div class='mb-4 row d-flex justify-content-center'>
                    <label for='staticEmail' class='col-sm-2 col-form-label'>Venue</label>
                    <div class='col-sm-6'>
                    <input type='text' name='nid' id='nid' readonly class='form-control form_data' value='".$venue['name']."'>
                    </div>
                </div>
                
                <div style='border:1px; margin:2% 0%;'>
                <table class='table table-bordered border-secondary'>
                <thead>
                    <tr><th colspan='3'>
                        <div class='text-center'>
                        <h5>Vaccine Information</h5>
                        </div></th>
                    </tr>
                    <tr>
                        <th>Dose</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td>1st Dose</td>
                        <td>".$fd['dose_date']."</td>
                    </tr>
                    <tr>
                        <td>2nd Dose</td>
                        <td>".$sd['dose_date']."</td>
                    </tr>
                    <tr>
                        <td rowspan='2'>Brand</td>
                        <td>Dose 1:    Vero Cell</td>
                    </tr>
                    <tr>
                        <td>Dose 2:    Vero Cell</td>
                    </tr>
                    
                </tbody>    
                </table>
                </div>
            </div>
            
        ";
        }else{
            echo "error<div class='alert alert-danger'>Information mismatch!</div>";      
          }
  }
}else{
    echo "error<div class='alert alert-danger'>Information mismatch!</div>";
}
?>
