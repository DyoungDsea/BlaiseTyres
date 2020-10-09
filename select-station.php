<?php
require 'conn.php';
$out = '';

if(isset($_POST['Station'])){
    
    $out .= '
    <div class="col-md-6">Delivery Station</div>
    <div class="col-md-6">
    <select name="location" id="mySelectsx" class="form-control form-control-sm boxx mt-2">
    <option value="">Choose Delivery Station</option>';    
    $sk = $conn->query("SELECT * FROM `ddelivery` WHERE status='active' AND dcategory='Delivery Station' ORDER BY dlocation");
    if($sk->num_rows>0):
        while($skk =$sk->fetch_assoc()):
            $out .= '<option value="'.$skk['dprice'].'">'.$skk['dlocation'].'</option>';
        endwhile;
    endif;
    
    $out .='</select> 
    </div>';


}


echo $out;


?>