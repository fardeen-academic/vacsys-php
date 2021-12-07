<?php
include("templates/header.php");
?>
<?php
echo "<script type='text/javascript' src='/js/venue.js'></script>";
?>
<div class="single-title-header">
    <h1>Register for Vaccine</h1>
</div>

<div class="container">
  <!-- Form starts here -->
  <form class="needs-validation" id="register-form" action="/php/registration.php" method="POST" novalidate>
  <h2 class=" d-flex justify-content-center">Enter your information below to register.</h2><br><br>
  
  <!--Birth date information-->
  <div class="birthdateinfo" id="birthdateinfo">
  <div class="row d-flex justify-content-center">
      <div class="col-md-7 mb-2">
          <label for="" class="form-label">NID</label>
          <input type="number" name="nid" class="form-control" placeholder="Enter your NID" required>
          <div class="invalid-feedback">Please enter your NID.</div>
      </div>
  </div>  

  <div class="row d-flex justify-content-center">
  <div class="col-md-2 mb-2">
        <label for="birth-date" class="form-label">Birth Date</label>
        <input class="form-control" name="bdate" type="number" max="31" id="birth-date" placeholder="DD" required>
        <div class="invalid-feedback">Please enter your birthdate.</div>
        
      </div>
      <div class="col-md-3 mb-2">
      <label for="birth-month" class="form-label">Birth Month</label>
        <select class="form-select" name="bmonth" id="birth-month" required>
          <option value="">Choose...</option>
          <option value="01">January</option>
          <option value="02">February</option>
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
        <div class="invalid-feedback">Please enter your birth month.</div>
      </div>
      <div class="col-md-2 mb-2">
        <label for="birth-year" class="form-label">Birth Year</label>
        <input class="form-control" name="byear" type="text" id="birth-year" placeholder="YYYY" required>
        <div class="invalid-feedback">Please enter your birth year.</div>
      </div>
    </div>
      <br>
      <div class="row d-flex justify-content-center" id="">
      <div class="col-md-7 mb-2">
      <button class="btn btn-info" type="submit" id="next1">Next</button>
      </div>
      </div>
  </div>
  <!--Birth date information-->


      <!-- Modal -->
      <div class="modal fade date-warning" id="date-warning" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Not Eligible!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="datewarning.hide()"></button>
            </div>
            <div class="modal-body">
            Sorry you are not eligible for vaccine as your age is below 21.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="modal-okay" onclick="datewarning.hide()">Okay!</button>
            </div>
          </div>
        </div>
      </div>
      <!--Modal Ends -->

      <div id="personal-info">
      <div class="row d-flex justify-content-center">
      <div class="col-md-7 mb-2 text-secondary">
        <h4>Personal Information</h4>
      </div>
      </div>

    <div class="row d-flex justify-content-center">
    <div class="col-md-4 mb-2">
        <label for="name" class="form-label">Full Name</label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Full Name" required>
        <div class="invalid-feedback">Please enter your full name.</div>
        
      </div>

      <div class="col-md-3 mb-2">
        <label for="phone" class="form-label">Phone Number</label>
          <div class="input-group flex-nowrap">
          <span class="input-group-text" id="addon-wrapping">+880</span>
          <input class="form-control" name="phone" type="number" id="phone" placeholder="Phone Number" required>
          </div>
        
        <div class="invalid-feedback">Please enter your phone number.</div>
        
      </div>
    </div>


    <div class="row d-flex justify-content-center">
      <div class="col-md-7 mb-2 text-secondary">
        <h4>Venue Information</h4>
      </div>
      </div>

      <div class="row d-flex justify-content-center" id="venue-select">

      <div class="col-md-2 mb-2">
      <label for="division" class="form-label">Division</label>
        <select class="form-select" id="division" required onchange="javascript: choosevenue(this.options[this.selectedIndex].value);">
          <option value="">Choose...</option>
          <option value="Barisal">Barisal</option>
          <option value="Chittagong">Chittagong</option>
          <option value="Dhaka">Dhaka</option>
          <option value="Khulna">Khulna</option>
          <option value="Mymensingh">Mymensingh</option>
          <option value="Rajshahi">Rajshahi</option>
          <option value="Rangpur">Rangpur</option>
          <option value="Sylhet">Sylhet</option>     
        </select>
        <div class="invalid-feedback">Please enter your division.</div>
      </div>
      <div class="col-md-2 mb-2">
      <label for="district" class="form-label">District</label>
        <select class="form-select" id="district" name="district" required>
          <option value="">Choose...</option>    
        </select>
        <div class="invalid-feedback">Please enter your district.</div>
      </div>
      <div class="col-md-3 mb-2">
      <label for="venue" class="form-label">Venue</label>
        <select class="form-select" id="venue" name="venue" required>
          <option value="">Choose...</option>    
        </select>
        <div class="invalid-feedback">Please enter your venue.</div>
      </div>

      </div>

      <div class="row d-flex justify-content-center" id="">
      <div class="col-md-7 mb-2">
      <button class="btn btn-primary" type="submit" id="submit">Submit</button>
      </div>
      </div>

      </div>
  <!-- Form ends here -->
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