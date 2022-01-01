<?php
include 'dash-main.php';
?>

<?php

//collecting dose data from sql
$fd = "SELECT * FROM `first_dose` WHERE id = '$nid'";
$sd = "SELECT * FROM `second_dose` WHERE id = '$nid'";
$fdetails = mysqli_fetch_assoc(mysqli_query($conn, $fd));
$sdetails = mysqli_fetch_assoc(mysqli_query($conn, $sd));
$fdate = $fdetails['dose_date'];
if ($fdate == "") {
    $fdate = "Not Given";
}
$fdone = $fdetails['dose_done'];
if ($fdone == "0") {
    $fdone = "No";
}else{
    $fdone = "Yes";
}
$sdate = $sdetails['dose_date'];
if ($sdate == "") {
    $sdate = "Not Given";
}
$sdone = $sdetails['dose_done'];
if ($sdone == "0") {
    $sdone = "No";
}else{
    $sdone = "Yes";
}

$status = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `member` WHERE nid = '$nid'"));
$status = $status['status'];
if ($status == "") {
    $status = "0";
}
//collecting health info from sql
$highbp = "NO";
$diabetes = "NO";
$kidney = "NO";
$cancer = "NO";
$covid = "NO";

$health = "SELECT * FROM health WHERE nid = '$nid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row['highbp'] == 1){
            $highbp = "YES";
        }
        if($row['diabetes'] == 1){
            $diabetes = "YES";
        }
        if($row['kidney'] == 1){
            $kidney = "YES";
        }
        if($row['cancer'] == 1){
            $cancer = "YES";
        }
        if($row['covid'] == 1){
            $covid = "YES";
        }
                

    }
  } else {
    echo "0 results";
  }
?>


<div class="mid">
    <div class="title">
        <h3>Welcome to VACSYS</h3>
        <h5>Dashboard</h5>
        <a class="btn btn-dark" href="card.php">Vaccine Card</a>
    </div>

    <div class="status">
        <h2>Vaccine Status</h2>
    <div class="row">
    <div class="col shadow" id="summary">
        <h5>Summary</h5>
        <span><?php echo $status; ?> Doses Done</span>
    </div>
        <div class="col shadow" id="first">
            <h5>1st Dose</h5>
            <span>Date: <?php echo $fdate; ?></span>
            <br>
            <span>Done: <?php echo $fdone; ?></span>
        </div>
        <div class="col shadow" id="second">
            <h5>2nd Dose</h5>
            <span>Date: <?php echo $sdate; ?></span>
            <br>
            <span>Done: <?php echo $sdone; ?></span>
        </div>
        
        
    </div>
    </div>

    <div class="health">
        <h2>Health Status</h2>
        <div class="healthstatus d-flex flex-wrap justify-content-around">
            <div class="hstatus row shadow">
                <div class="icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <div class="text">
                    <h5>High Blood Pressure</h5>
                    <span class="hvalue"><?php echo $highbp; ?></span>  
                </div>
            </div>
            <div class="hstatus row shadow">
                <div class="icon">
                <i class="fas fa-tint"></i>
                </div>
                <div class="text">
                    <h5>Diabetes</h5>
                    <span class="hvalue"><?php echo $diabetes; ?></span>  
                </div>
            </div>
            <div class="hstatus row shadow">
                <div class="icon">
                <i class="fas fa-disease"></i>
                </div>
                <div class="text">
                    <h5>Kidney Disease</h5>
                    <span class="hvalue"><?php echo $kidney; ?></span>  
                </div>
            </div>
            <div class="hstatus row shadow">
                <div class="icon">
                <i class="fas fa-virus"></i>
                </div>
                <div class="text">
                    <h5>Cancer</h5>
                    <span class="hvalue"><?php echo $cancer; ?></span>  
                </div>
            </div>
            <div class="hstatus row shadow">
                <div class="icon">
                <i class="fas fa-viruses"></i>
                </div>
                <div class="text">
                    <h5>Covid-19</h5>
                    <span class="hvalue"><?php echo $covid; ?></span>  
                </div>
            </div>
            <div class="hstatus row shadow">
                <div class="icon">
                <i class="fas fa-tint"></i>
                </div>
                <div class="text">
                    <h5>Diabetes</h5>
                    <span class="hvalue"><?php echo $diabetes; ?></span>  
                </div>
            </div>
            
            
        </div>
    </div>
</div>

<div class="right">
    <div class="brand d-print-none">
        <h5>Available Vaccine Brands</h5>
        <ul>
            <li>Pfizer-BioNTech</li>
            <li>Moderna</li>
            <li>Oxford-AstraZeneca</li>
            <li>Sinopharm</li>
            <li>Sinovac</li>
        </ul>
    </div>
    
</div>

<?php
include 'footer.php';
?>