<?php
include 'dash-main.php';
?>

<?php
if(isset($_POST['dlcard'])){
    $nid = $_SESSION['nid'];
    $sql = "SELECT status FROM `member` WHERE nid = '$nid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $status = $row['status'];
    if($status==0){
        $message = "<div class='alert alert-danger d-print-none'>Sorry you have not completed you doses yet. You can download vaccine certificate after completing 2 doses.
        <br>Doses done: ".$status."</div>";
    }
}
?>

<div class="card-right">
<div class="title d-print-none">
        <h3>Welcome to VACSYS</h3>
        <h5>Vaccine Card</h5>
        <form method="POST">
        <button type="submit" name="dlcard" class="btn btn-dark">Download Vaccine Card</button>
        </form>
    </div>
    
    <div class="row">
        <div class="col">
    <?php
    $nid = $_SESSION["nid"];
    $query = "SELECT * FROM member WHERE nid=$nid";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if(isset($_POST['dlcard'])){
                $v = $row['venue'];
                $fd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from first_dose WHERE id=$nid"));
                $sd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from second_dose WHERE id=$nid"));
                $venue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from venue WHERE id='$v'")); 
                $date = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from member WHERE nid='$nid'"))['birthdate'];           
                echo" 
                <button class='btn btn-success d-print-none' id='download-v-card-btn' onclick='window.print()'>Download Vaccine Card</button>
                <nav class='navbar navbar-expand-md navbar-light'>
                <img src='../images/vacsys-logo.png' width='100px'>
                <div class='navbar-link ms-auto'>
                    <ul class='navbar-nav text-center'>
                    <li class='nav-item'><aclass='nav-link disabled'><img src='../images/govt.png' width='40px'></a></li>
                    </ul>
                </div>
                </nav>
                <div class='text-center pb-3'>
                <h5><b>Covid-19 Vaccination Card</b></h5>
                </div>
                <div style='border: 1; margin:3% 2%;'>
                <div class='input mb-4 row d-flex justify-content-center'>
                        <label for='staticEmail' class='col-3 col-form-label'>NID</label>
                        <div class='col-9'>
                        <input type='text' name='nid' id='nid' readonly class='form-control form_data' value='".$nid."'>
                        </div>
                    </div>
                    <div class='input mb-4 row d-flex justify-content-center'>
                        <label for='staticEmail' class='col-3 col-form-label'>Name</label>
                        <div class='col-9'>
                        <input type='text' name='nid' id='nid' readonly class='form-control form_data' value='".$row['name']."'>
                        </div>
                    </div>
                    <div class='input mb-4 row d-flex justify-content-center'>
                        <label for='staticEmail' class='col-3 col-form-label'>Date of Birth</label>
                        <div class='col-9'>
                        <input type='text' name='nid' id='nid' readonly class='form-control form_data' value='".$date."'>
                        </div>
                    </div>
                    <div class='input mb-4 row d-flex justify-content-center'>
                        <label for='staticEmail' class='col-3 col-form-label'>Venue</label>
                        <div class='col-9'>
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
                            <th>Signature</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                            <td>1st Dose</td>
                            <td>".$fd['dose_date']."</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2nd Dose</td>
                            <td>".$sd['dose_date']."</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan='2'>Brand</td>
                            <td colspan='2'>Dose 1:</td>
                        </tr>
                        <tr>
                            <td colspan='2'>Dose 2:</td>
                        </tr>
                        
                    </tbody>    
                    </table>
                    </div>
                </div>
                
            ";
            }
    }
    }
    ?>
    </div>

    <div class="col d-none d-print-block">
        <div class="alert alert-danger mb-3">
            General Instructions
        </div>
        <ul>
            <li>To take the 1st and 2nd dose of Covid-19 vaccine, bring this vaccine card to the designated vaccination center on the specified date.</li>
            <li>Inform the immunization worker immediately if there is any problem / difficulty after vaccination.  If necessary, bring the intended people to the nearest health center.</li>
            <li>Vaccination center and date will be informed via SMS before vaccination.</li>
            <li>Save the card for future use even after vaccination is over.</li>
            <li>Even if the vaccine card is lost, it can be downloaded from the website www.surokkha.gov.bd.</li>
            <li>Certificate can be collected from www.surokkha.gov.bd after completing 2 doses of Covid-19 vaccine.</li>
            <li>Even if you get vaccinated against Covid-19, follow proper health rules.</li>
              
        </ul>
        <div class="alert alert-danger mb-5 mt-2">
        With your cooperation, the Government of Bangladesh is committed to deliver the Covid-19 vaccine to all who are targeted.
        </div>
        <p class="text-center">
        Extended Immunization Program (EPI) <br>
        Department of Health <br>
        Ministry of Health and Family Welfare <br> <br> <br>
        :: In collaboration :: 
        </p>
        <div class="logo row mx-5">
            <div class="col">
                <img src="../images/bd.png" width="40px" alt="">
            </div>
            <div class="col">
                <img src="../images/digi-bd.png" width="50px" alt="">
            </div>
            <div class="col">
                <img src="../images/ict-div.png" width="50px" alt="">
            </div>
        </div>
        </div>
    </div>


    
</div>



<?php
include 'footer.php';
?>