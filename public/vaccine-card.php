<?php
include("templates/header.php");
?>
<div class="single-title-header">
    <h1>Download Vaccine Card</h1>
</div>

<div class="container">
  <!-- Form starts here -->
  <form class="needs-validation" id="register-form" novalidate>
  <h2 class=" d-flex justify-content-center">Enter your information below to download vaccine card.</h2><br><br>
  
  <!--Birth date information-->
  <div class="birthdateinfo" id="birthdateinfo">
  <div class="row d-flex justify-content-center">
      <div class="col-md-6 mb-2">
          <label for="" class="form-label">NID</label>
          <input type="number" class="form-control" placeholder="Enter your NID" required>
          <div class="invalid-feedback">Please enter your NID.</div>
      </div>
  </div>  

  <div class="row d-flex justify-content-center">
  <div class="col-md-2 mb-2">
        <label for="birth-date" class="form-label">Birth Date</label>
        <input class="form-control" type="number" max="31" id="birth-date" placeholder="DD" required>
        <div class="invalid-feedback">Please enter your birthdate.</div>
        
      </div>
      <div class="col-md-2 mb-2">
      <label for="birth-month" class="form-label">Birth Month</label>
        <select class="form-select" id="birth-month" required>
          <option value="">Choose...</option>
          <option value="1">January</option>
          <option value="2">February</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>        
        </select>
        <div class="invalid-feedback">Please enter your birth month.</div>
      </div>
      <div class="col-md-2 mb-2">
        <label for="birth-year" class="form-label">Birth Year</label>
        <input class="form-control" type="number" min="1900" id="birth-year" placeholder="YYYY" required>
        <div class="invalid-feedback">Please enter your correct birth year.</div>
      </div>
    </div>
      <br>
      <div class="row d-flex justify-content-center" id="">
      <div class="col-md-6 mb-2">
      <button class="btn btn-primary" type="submit" id="next1">Next</button>
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
<?php
echo "<script type='text/javascript' src='/js/register.js'></script>";
?>
<?php
include("templates/footer.php");
?>