<?php
include("templates/header.php");
?>
<div class="single-title-header">
    <h1>Check Your Status</h1>
</div>

<div class="container">
  <!-- Form starts here -->
  <form action="" method="POST" class="needs-validation" id="statusform" novalidate>
  <h2 class=" d-flex justify-content-center">Enter your information below to check status.</h2><br>
  <!--Birth date information-->
  <div class="birthdateinfo" id="birthdateinfo">
  <div class="row d-flex justify-content-center">
      <div class="col-md-6 mb-2">
          <label for="" class="form-label">NID</label>
          <input value="123456789" type="number" class="form-control form_data" id="nid" name="nid" placeholder="Enter your NID" required>
      </div>
  </div>  
<br>
  <div class="row d-flex justify-content-center">
  <div class="col-md-2 mb-2">
        <label for="birth-date" class="form-label">Birth Date</label>
        <input value="08" class="form-control form_data" type="number" name="bdate" max="31" id="birth-date" placeholder="DD" required>
        
      </div>
      <div class="col-md-2 mb-2">
      <label for="birth-month" class="form-label">Birth Month</label>
        <select class="form-select form_data" id="birth-month" name="bmonth" required>
          <option value="">Choose...</option>
          <option value="01">January</option>
          <option value="02" selected>February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>        
        </select>
      </div>
      <div class="col-md-2 mb-2">
        <label for="birth-year" class="form-label">Birth Year</label>
        <input value="2000" class="form-control form_data" type="number" min="1900" name="byear" id="birth-year" placeholder="YYYY" required>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-md-6 mb-2">
      <button class="btn btn-primary statusmodal" type="submit" name="submit" id="submit" onclick="check_status(); return false;">Check Status</button>
      </div>
      </div>
      <div class="row d-flex justify-content-center">
      <div class="col-md-6 mb-2" id="message">
      </div>
      </div>
      
  </div>
  <!--Birth date information-->

  </form>
</div>





<?php
echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>";
?>
<?php
echo "<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'
integrity='sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/'
crossorigin='anonymous'></script>";
?>
<script>
  function check_status(){
    var form_element = document.getElementsByClassName('form_data');
    var form_data = new FormData()
    for(var count=0; count < form_element.length; count++){
    form_data.append(form_element[count].name, form_element[count].value);
  }
  document.getElementById('submit').disabled = true;
  var ajax_request = new XMLHttpRequest();

  ajax_request.open('POST', 'php/returnstatus.php');

  ajax_request.send(form_data);

  ajax_request.onreadystatechange = function(){
    if(ajax_request.readyState == 4){
      document.getElementById('submit').disabled = false;
      document.getElementById('statusform').reset();
      document.getElementById('message').innerHTML = ajax_request.responseText;
      
      /*setTimeout(function(){
        document.getElementById('message').innerHTML = '';
      }, 2000)*/
    }
  }
}
</script>

<?php
include("templates/footer.php");
?>