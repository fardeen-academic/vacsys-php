<?php
include("templates/header.php");
?>

<div class="large_image">
    <h1>Vaccinate your family now</h1>
    <h2>Free vaccination program by VACSYS</h2><br>
    <p>Get two doses of free vaccination by registering on our vaccination program.</p><br>
    <button type="button" class="btn btn-primary">Register Now</button>
    <button type="button" class="btn btn-light">Vaccine Certificate</button>
    
</div>


<div class="card-menu container px-4 py-5" id="custom-cards">

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
      <div class="col" >
        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg">
          <div class="card1 card-header d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <a href="register.php" class="text-dark pt-5 mt-5 mb-4 display-6 lh-1 fw-bold stretched-link">Register Now</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg">
          <div class="card2 card-header d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <a href="vaccine-card.php" class="text-dark pt-5 mt-5 mb-4 display-6 lh-1 fw-bold stretched-link">Download Vaccine Card</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg">
          <div class="card3 card-header d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
          <a href="certificate.php" class="text-dark pt-5 mt-5 mb-4 display-6 lh-1 fw-bold stretched-link">Vaccine Certificate</a>
          </div>
        </div>
      </div>
    </div>
  </div>



    <!--Features-->

<div class="container px-4 py-5" id="featured-3">
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
    <div class="p-5 feature col">
        <div class="feature-icon">
        <img src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-vitaly-gorbachev/60/000000/external-vaccine-baby-vitaliy-gorbachev-lineal-vitaly-gorbachev.png"/>
        </div>
        <br>
        <h2>Brand Choice</h2>
        <p>We offer several brands of vaccine to choose from. Choose your preferable one.</p>
      </div>
      <div class="p-5 feature col">
        <div class="feature-icon">
        <img src="https://img.icons8.com/ios-glyphs/60/000000/group.png"/>
        </div>
        <br>
        <h2>10K+ Vaccinated</h2>
        <p>More than 10000 people got vaccinated from us.</p>
      </div>
      <div class="p-5 feature col">
        <div class="feature-icon">
        <img src="https://img.icons8.com/ios-glyphs/60/000000/user.png"/>
        </div>
        <br>
        <h2>12K+ Registered</h2>
        <p>More than 12000 people registered for vaccine and more registering.</p>
      </div>

    </div>
  </div>

<?php
include("templates/footer.php");
?>