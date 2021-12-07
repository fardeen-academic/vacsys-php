<?php
    for($i=1;$i<32;$i++){
        if($i<10){
            echo "<option value='0".$i."'>0".$i."</option>";
        }else{
            echo "<option value='".$i."'>".$i."</option>";
        }
        
    }
?>