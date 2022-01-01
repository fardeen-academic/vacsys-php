<?php
include 'dash-main.php';
?>

<?php
if (isset($_POST['dlcard'])) {
    $nid = $_SESSION['nid'];
    $sql = "SELECT status FROM `member` WHERE nid = '$nid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $status = $row['status'];
    if ($status == 0) {
        $message = "<div class='alert alert-danger d-print-none'>Sorry you have not completed you doses yet. You can download vaccine certificate after completing 2 doses.
        <br>Doses done: " . $status . "</div>";
    }
}
?>

<div class="cert-right">
    <div class="title d-print-none">
        <h3>Welcome to VACSYS</h3>
        <h5>Vaccine Card</h5>
        <form method="POST">
            <button type="submit" name="dlcard" class="btn btn-dark">Download Vaccine Certificate</button>
        </form>
    </div>
    <?php echo $message; ?>

    <?php
    $nid = $_SESSION["nid"];
    $query = "SELECT * FROM member WHERE nid=$nid";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            if (isset($_POST['dlcard'])) {
                $v = $row['venue'];
                $fd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from first_dose WHERE id=$nid"))['dose_date'];
                $sd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from second_dose WHERE id=$nid"))['dose_date'];
                $venue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from venue WHERE id='$v'"))['name'];
                $date = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from member WHERE nid='$nid'"))['birthdate'];
                if ($status == 2) {
                    echo '
                    <button class="btn btn-success d-print-none m-5 w-100" id="print-v-cert-btn" onclick="window.print()">Download Vaccine Certificate</button>
                    
    <div class="cert" id="cert">
        <table class="table table-borderless text-center" id="cert-table" border="1" style="background-color:rgba(0, 0, 0, 0);">
            <tr border="0">
                <td class="fw-bold fs-2 text-end"><img src="../images/vacsys-logo.png" width="150px"></td>
                <td colspan="2">Government of the Peoples Republic of Bangladesh <br>
                    Ministry of Health and Family Welfare
                    </td>
                <td class="text-start"><img src="../images/govt.png" width="100px"></td>
            </tr>

            <tr>
                <td colspan="4"><img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=Name:%20' . $name . '%0ANID:%20' . $nid . '%0ACertificate%20No:%20BD' . $nid . '%0AVaccination%20by%20VACSYS" alt="" title="" /></td>
            </tr>
            <tr class="solid">
                <td colspan="4">
                    <div>COVID-19 Vaccination Certificate</div>
                </td>
            <tr class="bg-secondary bg-opacity-25 fw-bold">
                <th colspan="2">Beneficiary Details (টিকা গ্রহণকারীর বিবরণ) </th>
                <th colspan="2">Vaccination Details (টিকা প্রদানের বিবরণ)</th>
            </tr>
            <tr>
                <td class="dash-no-left text-end">Certificate No: <br> সার্টিফিকেট নং-<br></td>
                <td class="dash text-start">BD' . $nid . '</td>
                <td class="dash text-end">Date of Vaccination (Dose 1): <br>টিকা প্রদানের তারিখ (ডোজ ১):<br></td>
                <td class="dash-no-right text-start">' . $fd . '</td>
            </tr>
            <tr>
                <td class="dash-no-left text-end">NID number: <br>জাতীয় পরিচয়পত্র নং-<br></td>
                <td class="dash text-start">' . $nid . '</td>
                <td class="dash text-end">Name of Vaccine (Dose 1): <br>টিকার নাম (ডোজ ১):<br></td>
                <td class="dash-no-right text-start">Pfizer</td>
            </tr>
            <tr>
                <td class="dash-no-left text-end">Passport No: <br>পাসপোর্ট নং-<br></td>
                <td class="dash text-start">N/A</td>
                <td class="dash text-end">Date of Vaccination (Dose 2): <br>টিকা প্রদানের তারিখ (ডোজ ২):<br></td>
                <td class="dash-no-right text-start">' . $sd . '</td>
            </tr>
            <tr>
                <td class="dash-no-left text-end">Nationality: <br>জাতীয়তা:<br></td>
                <td class="dash text-start">Bangladeshi</td>
                <td class="dash text-end">Name of Vaccine (Dose 2): <br>টিকার নাম (ডোজ ২):<br></td>
                <td class="dash-no-right text-start">Pfizer</td>
            </tr>
            <tr>
                <td class="dash-no-left text-end">Name: <br>নাম:<br></td>
                <td class="dash text-start">' . $name . '</td>
                <td rowspan="2" class="dash text-end align-middle">Vaccination Center<br>টিকা প্রদানের কেন্দ্র:<br></td>
                <td rowspan="2" class="dash-no-right text-start">' . $venue . '</td>
            </tr>
            <tr>
                <td class="dash-no-left text-end">Date Of Birth: <br>জন্ম তারিখ:<br></td>
                <td class="dash text-start">' . $date . '</td>
            </tr>
            <tr>
                <td class="dash-no-left text-end">Gender:<br>লিঙ্গ:<br></td>
                <td class="dash text-start">Male</td>
                <td class="dash text-end">Vaccinated By <br>টিকা প্রদানকারী:<br></td>
                <td class="dash-no-right text-start">Directorate General of Health Services (DGHS)</td>
            </tr>
            <tr>
                <td colspan="4" class="dash-top">To verify this certificate please visit www.surokkha.gov.bd/verify or scan the QR code.<br>
(এই সার্টিফিকেটটি যাচাই করার জন্য ভিজিট করুন www.surokkha.gov.bd/verify অথবা qr কোডটি স্ক্যান করুন।)</td>
            </tr>
            <tr class="solid">
            <td colspan="4">For any further assistance, please visit www.dghs.gov.bd or e-mail: info@dghs.gov.bd<br>
            (প্রয়োজনে www.dghs.gov.bd ওয়েবসাইট ভিজিট করুন অথবা ইমেইল করুন: info@dghs.gov.bd)</td>
            </tr>
            <tr class="bg-secondary bg-opacity-25 fw-bold">
                <th colspan="4">In cooperation with</th>
            </tr>
            <tr class="px-5">
                <td colspan="4" class="px-5">
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
                </td>
            </tr>
        </table>
    </div>
';
                }
            }
        }
    }
    ?>
</div>

<div class="watermark">
    <img src="../images/vacsys-logo-hd.png" alt="">
</div>


<script type="application/javascript">
    const {
        jsPDF
    } = window.jspdf;

    var doc = new jsPDF();

    function saveDiv(divId, title) {
        console.log(doc);
        doc.html(`<html><head><title>${title}</title></head><body>` + document.getElementById(divId).innerHTML + `</body></html>`);
        doc.save('certificate.pdf');
    }
</script>
<?php
include 'footer.php';
?>