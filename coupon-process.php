<?php
require 'conn.php';

// $result = false;
// $out = '';
// $cat = '';
$result=true;
if(isset($_POST['SumTotal'])){
    $code = $_POST['id'];
    $sql = $conn->query("SELECT * FROM dcoupon WHERE dcode='$code' AND dstatus='on'");
    if($sql->num_rows>0){
        $result = false;       
    }


$data = array(
    'result'=> $result
);



    echo json_encode($data);
}