<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom CSS-->
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/icons/css/all.css">
    <!-- Data table CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    
    <title>Admin Dashboard</title>
</head>
<body>
<div class="row vh-100 mw-100 mh-100">
    <div class="h-100 m-0 left-side col-xs-1 text-white">
        <h2 class="fw-bolder">VACSYS</h2>
        <br>
        <div class="menu">

                <!-- Vertical tabs -->
        <ul class="nav nav-tabs flex-column" role="tablist">
        <li class="nav-item button">
            <a class="nav-link active" href="#members" data-bs-toggle="tab" role="tab">
            <i class="fas fa-users"></i>
            <span>All Members</span>
            </a>
        </li>
        <li class="nav-item button">
            <a class="nav-link" href="#dose1" data-bs-toggle="tab" role="tab">
            <i class="fas fa-user"></i>
            <span>Dose One Waiting</span>
            </a>
        </li>
        <li class="nav-item button">
            <a class="nav-link" href="#dose2" data-bs-toggle="tab" role="tab">
            <i class="fas fa-user-shield"></i>
            <span>Dose Two Waiting</span>
            </a>
        </li>
        <li class="nav-item button">
            <a class="nav-link" href="#complete" data-bs-toggle="tab" role="tab">
            <i class="fas fa-user-check"></i>
            <span>All Dose Done</span>
            </a>
        </li>
        <li class="nav-item button" id="logout">
            <a class="nav-link" href="#" data-bs-toggle="tab" role="tab">
            <i class="fas fa-user-check"></i>
            Log out
            </a>
        </li>
        </ul>
        </div>

    </div>

    <div class="h-100 m-25 right-side col-xs-1 text-dark">
        <div class="container">
                    <!-- Tabs content -->
        <div class="tab-content">
        <div class="tab-pane fade show active" id="members" role="tabpanel">
            <h2 align="center">All Members</h2>
            <table class="table table-striped table-hover display" id="membertable">
                <thead><tr>
                    <th>NID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Doses Done</th>
                    <th>Update</th>
                </tr></thead>
                <tbody>
                <?php
                include "php/dash.php";
                ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="dose1" role="tabpanel">
        <div class="d-flex justify-content-center" style="margin-top: 100px;">
        <img src="images/construction.svg" width="50%">
        </div>    
        <div class="d-flex justify-content-center" style="margin-top: 100px;">
            <h4>This Section is under construction.</h4>
        </div>
        </div>
        <div class="tab-pane fade" id="dose2" role="tabpanel">
        <div class="d-flex justify-content-center" style="margin-top: 100px;">
        <img src="images/construction.svg" width="50%">
        </div>    
        <div class="d-flex justify-content-center" style="margin-top: 100px;">
            <h4>This Section is under construction.</h4>
        </div>
        </div>
        <div class="tab-pane fade" id="complete" role="tabpanel">
        <div class="d-flex justify-content-center" style="margin-top: 100px;">
        <img src="images/construction.svg" width="50%">
        </div>    
        <div class="d-flex justify-content-center" style="margin-top: 100px;">
            <h4>This Section is under construction.</h4>
        </div>
        </div>
        </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function (){
    $('#membertable').DataTable();
} );
</script>

<script>
$(function(){
    $(".updatemodal").click(function(){
        $('#nid').val($(this).data('nid'));
        $('#name').html($(this).data('name'));

        $('#fdate').val($(this).data('fdose').substring(0,2));
        $('#fmonth').val($(this).data('fdose').substring(3,5));
        $('#fyear').val($(this).data('fdose').substring(6,));
        $("#fdosedone").val($(this).data('fdosedone')).change();

        $('#sdate').val($(this).data('sdose').substring(0,2));
        $('#smonth').val($(this).data('sdose').substring(3,5));
        $('#syear').val($(this).data('sdose').substring(6,));
        $("#sdosedone").val($(this).data('sdosedone')).change();

        $('#venue').val($(this).data('venue'));
        $('#status').val($(this).data('status'));
        
        $("#update-all").modal("show");

    });
});
</script>
<script>
  function update_member(){
    var form_element = document.getElementsByClassName('form_data');
    var form_data = new FormData()
    for(var count=0; count < form_element.length; count++){
    form_data.append(form_element[count].name, form_element[count].value);
  }
  document.getElementById('submit').disabled = true;
  var ajax_request = new XMLHttpRequest();

  ajax_request.open('POST', 'php/updatemember.php');

  ajax_request.send(form_data);

  ajax_request.onreadystatechange = function(){
    if(ajax_request.readyState == 4){
      document.getElementById('submit').disabled = false;
      //document.getElementById('update-form').reset();
      document.getElementById('message').innerHTML = ajax_request.responseText;
      setTimeout(function(){
        document.getElementById('message').innerHTML = '';
      }, 2000)
    }
  }
}
</script>

</body>
</html>