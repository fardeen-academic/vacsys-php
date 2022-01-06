document.getElementById('personal-info').style.display = 'none';

function validation(){
  var valid = true;

  //validate nid
  var nid = document.getElementById("nid").value;
  var reg = /^[0-9]{10}([0-9]{3})?([0-9]{4})?/;
  if (!reg.test(nid)){
    document.getElementById('nid-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('nid-error').style.display = "none";
  }

  //validate birth date
  var bdate = document.getElementById("birth-date").value;
  var reg = /^[0-9]{2}/;
  if (!reg.test(bdate)){
    document.getElementById('bd-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('bd-error').style.display = "none";
  }

  //validate birth month
  var bmonth = document.getElementById("birth-month").value;
  var reg = /^[0-9]{2}/;
  if (!reg.test(bmonth)){
    document.getElementById('bm-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('bm-error').style.display = "none";
  }

  //validate birth year
  var byear = document.getElementById("birth-year").value;
  var reg = /^[0-9]{4}/;
  if (!reg.test(byear) || 2000 < byear || byear < 1900){
    document.getElementById('by-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('by-error').style.display = "none";
  }

  
  if(valid){
    document.getElementById('next1').style.display = 'none';
    document.getElementById('personal-info').style.display = 'block'
  }


  //validate High BP
  var hbp = document.querySelectorAll('input[name="highbp"]');
  if (!hbp[0].checked && !hbp[1].checked){
    document.getElementById('hbp-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('hbp-error').style.display = "none";
  }

  //validate Diabetes
  var dia = document.querySelectorAll('input[name="diabetes"]');
  if (!dia[0].checked && !dia[1].checked){
    document.getElementById('dia-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('dia-error').style.display = "none";
  }

  //validate Kidney
  var kidney = document.querySelectorAll('input[name="kidney"]');
  if (!kidney[0].checked && !kidney[1].checked){
    document.getElementById('kidney-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('kidney-error').style.display = "none";
  }

  //validate Cancer
  var cancer = document.querySelectorAll('input[name="cancer"]');
  if (!cancer[0].checked && !cancer[1].checked){
    document.getElementById('cancer-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('cancer-error').style.display = "none";
  }

  //validate Covid
  var covid = document.querySelectorAll('input[name="covid"]');
  if (!covid[0].checked && !covid[1].checked){
    document.getElementById('covid-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('covid-error').style.display = "none";
  }







  //validate name
  var name = document.getElementById("name").value;
  var reg = /^([a-zA-Z. ]{2,})$/;
  if (!reg.test(name)){
    document.getElementById('name-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('name-error').style.display = "none";
  }


  //validate Phone
  var phone = document.getElementById("phone").value;
  var reg = /^1[3-9]{1}[0-9]{8}$/;
  if (!reg.test(phone)){
    document.getElementById('phone-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('phone-error').style.display = "none";
  }

  //validate Division
  var division = document.getElementById("division").value;
  if (division == ""){
    document.getElementById('division-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('division-error').style.display = "none";
  }

  //validate District
  var district = document.getElementById("district").value;
  if (district == ""){
    document.getElementById('district-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('district-error').style.display = "none";
  }

  //validate Venue
  var venue = document.getElementById("venue").value;
  if (venue == ""){
    document.getElementById('venue-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('venue-error').style.display = "none";
  }
  
  //validate Password
  var pass = document.getElementById("pass").value;
  if (pass.length < 6){
    document.getElementById('pass-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('pass-error').style.display = "none";
  }
  
  var pass2 = document.getElementById("pass2").value;
  if (pass2 != pass){
    document.getElementById('pass2-error').style.display = "block";
    valid = false;
  }else{
    document.getElementById('pass2-error').style.display = "none";
  }
  
  
  
  if (valid){
    document.getElementById('register-form').submit();
    return true;

  }
  //final touch
  if(!valid){
    alert("Please fill all the fields correctly");
    return false;
  }
}

