
<script>



    var hval = document.getElementsByClassName('hvalue');
    var hstatus = document.getElementsByClassName('hstatus');
    for (let i = 0; i < hval.length; i++)
    {
        if(hval[i].innerHTML == 'YES')
        {
            hstatus[i].style.backgroundColor = '#F47174';
        }
        else{
            hstatus[i].style.backgroundColor = '#ACD1AF';
        }
    }


    var btnContainer = document.getElementById("menu");

    // Get all buttons with class="btn" inside the container
    var btns = btnContainer.getElementsByClassName("link");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");

    // If there's no active class
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    this.className += " active";
  });
}



</script>


</div>
</body>
</html>