<?php
session_start();

$top ='';
$tops ='';
$state = '';

	if (isset($_POST["SumTotal"])) {        
        $id = (Float)$_POST['id'];
        $total = 0;
        $qty = 0;
        foreach($_SESSION["subscribe"] as $keys => $values){
           $total += $id;
           $qty += $values['qty'];
           
        }
        $tops .= '&#8358;'.number_format($total* $qty,2);
        if(isset($_SESSION['coupons'])){
            $totals =((Float)$_SESSION['coupons'] + ($total * $qty));
            $_SESSION['grand']= $totals;
        }else{
            $totals =((Float)$_SESSION['total'] + ($total * $qty));
            $_SESSION['grand']=(Float)$_SESSION['total'] + ($total * $qty);
        }
        $top .=  '&#8358;'.number_format($totals,2);


        $_SESSION['location']=$_POST['text'];
        $_SESSION['cost']=($total * $qty);
        $_SESSION['costs']=$id;

        // $state .='<textarea name="" placeholder="Enter Address" id="sub-address" class="form-control mt-2"></textarea>';

        
		
    }
    
    $out = array(
        'top'=> $top,
        'tops'=> $tops
    );

    echo json_encode($out);

?>