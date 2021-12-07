$(document).ready(function (){
    $('#membertable').DataTable();
} );


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
  window.location.reload();
}