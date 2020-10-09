<?php 
if($r['privilege']=='admin'){
  include 'admin.php';
}else {      
      $explode = explode(',', $r['dprivilege']);
      include 'admin-staff.php';

}
      ?>