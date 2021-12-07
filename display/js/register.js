// Example starter JavaScript for disabling form submissions if there are invalid fields
var valid = false;
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            valid = false;
            event.preventDefault()
            event.stopPropagation()
          }
          valid=true;
          form.classList.add('was-validated')
        }, false)
      })
  })()


var next1 = document.getElementById("next1");
var month = document.getElementById("birth-month");
var year = document.getElementById("birth-year");
datewarning = new bootstrap.Modal(document.getElementById("date-warning"), {});
const personalinfo = document.getElementById("personal-info");
personalinfo.style.display = "none";
//datewarning.style.display= "none";

next1.onclick = function(){
    console.log("Next clicked");
    if(year.value > 2000){
        //document.getElementById("birthdateinfo").style.display = 'none';
        //datewarning.style.display = 'block';
        datewarning.show();
    }
    else if(valid){
        personalinfo.style.display = "block";
    }

}


function date_warning_okay(){
    datewarning.style.display = 'none';
    document.getElementById('register-form').reset();
}

var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});
document.onreadystatechange = function () {
  myModal.show();
};