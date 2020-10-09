<?php
function relativeTime($time, $short = false){
    $SECOND = 1;
    $MINUTE = 60 * $SECOND;
    $HOUR = 60 * $MINUTE;
    $DAY = 24 * $HOUR;
    $MONTH = 30 * $DAY;
    $before = time() - $time;

    if ($before < 0)
    {
        return "not yet";
    }

    if ($short){
        if ($before < 1 * $MINUTE)
        {
            return ($before <5) ? "just now" : $before . " ago";
        }

        if ($before < 2 * $MINUTE)
        {
            return "1m ago";
        }

        if ($before < 45 * $MINUTE)
        {
            return floor($before / 60) . "m ago";
        }

        if ($before < 90 * $MINUTE)
        {
            return "1h ago";
        }

        if ($before < 24 * $HOUR)
        {

            return floor($before / 60 / 60). "h ago";
        }

        if ($before < 48 * $HOUR)
        {
            return "1d ago";
        }

        if ($before < 30 * $DAY)
        {
            return floor($before / 60 / 60 / 24) . "d ago";
        }


        if ($before < 12 * $MONTH)
        {
            $months = floor($before / 60 / 60 / 24 / 30);
            return $months <= 1 ? "1mo ago" : $months . "mo ago";
        }
        else
        {
            $years = floor  ($before / 60 / 60 / 24 / 30 / 12);
            return $years <= 1 ? "1y ago" : $years."y ago";
        }
    }

    if ($before < 1 * $MINUTE)
    {
        return ($before <= 1) ? "just now" : $before . " seconds ago";
    }

    if ($before < 2 * $MINUTE)
    {
        return "a minute ago";
    }

    if ($before < 45 * $MINUTE)
    {
        return floor($before / 60) . " minutes ago";
    }

    if ($before < 90 * $MINUTE)
    {
        return "an hour ago";
    }

    if ($before < 24 * $HOUR)
    {

        return (floor($before / 60 / 60) == 1 ? 'about an hour' : floor($before / 60 / 60).' hours'). " ago";
    }

    if ($before < 48 * $HOUR)
    {
        return "yesterday";
    }

    if ($before < 30 * $DAY)
    {
        return floor($before / 60 / 60 / 24) . " days ago";
    }

    if ($before < 12 * $MONTH)
    {

        $months = floor($before / 60 / 60 / 24 / 30);
        return $months <= 1 ? "one month ago" : $months . " months ago";
    }
    else
    {
        $years = floor  ($before / 60 / 60 / 24 / 30 / 12);
        return $years <= 1 ? "one year ago" : $years." years ago";
    }

    return "$time";
}

function last_seen($ttime){
    return relativeTime(strtotime($ttime));
}
function read_able($ttime){
    return date("M j,Y h:i:s a",strtotime($ttime));
}
function easy($value){
    $value=strip_tags($value);
    $value=trim($value);
    return $value;
}
function remove_tags($value){
$value=htmlspecialchars_decode($value);
$value=html_entity_decode($value);
$value=strip_tags($value);
$value=htmlspecialchars($value);
return $value;
}
function handle($value){
    $value=strip_tags($value);
    $value=trim($value);
    $value=htmlspecialchars($value);
    return $value;
}
function nwords($string,$num){
    return implode(' ', array_slice(explode(' ', $string), 0, $num));
}
function money($low){
   return "&#8358;".number_format($low,2);
}
function dollar($low){
    return "$".number_format($low,2);
 }
function digits($receiver_phone){
    $receiver_phone=str_replace('+','',$receiver_phone);
    $receiver_phone=str_replace(' ','',$receiver_phone);
    if(strlen($receiver_phone)==11 and substr($receiver_phone,0,1)=='0') {
    return $receiver_phone='234'.substr($receiver_phone,1,20);
    }
}
function replaceKey($array,$oldkey,$newkey){
    if(array_key_exists($oldkey,$array)){
        $array[$newkey]=$array[$oldkey];
        unset($array[$oldkey]);
        return $array;
    }
    return false;
}
function back(){
    echo "<script> history.back();</script>"; 
}
function update_last_seen($id){
    global $conn;
    $query_up=$conn->prepare("update users set last_activity=NOW() where id=?");
    $query_up->bind_param('i',$id);
    $query_up->execute();
}


function fullname($user_id){
  global $conn;
  $query_s=$conn->query("select firstname,lastname from users where id='".$user_id."'");
  if($query_s->num_rows==1){
      while($row=$query_s->fetch_assoc()){
          $firstname=$row['firstname'];
          $lastname=$row['lastname'];
      }
  }else{
      $firstname="User";
      $lastname="Unknown";
  }
  return ucwords($lastname." ".$firstname);
}
function firstname($user_id){
    global $conn;
    $query_f=$conn->query("select firstname from users where id='".$user_id."'");
    if($query_f->num_rows==1){
        while($row=$query_f->fetch_assoc()){
            $firstname=$row['firstname'];
        }
    }else{
        $firstname="User";
    }
    return ucwords($firstname);
  }
function check_dp($user_id){
    global $conn;
    $query_ch=$conn->query("select image from users where id='".$user_id."'");
    if($query_ch->num_rows==1){
        while($row=$query_ch->fetch_assoc()){
            $image=is_file("../images/profiles/$row[image]") ? $row['image'] : "default_dash.jpg";
        }
    }else{
        $image="default_dash.jpg";
    }
return $image;
}




function check_admin($user_id){
    global $conn;
    $query_ch2=$conn->query("select privilege from users where id='".$user_id."'");
    if($query_ch2->num_rows==1){
        while($row=$query_ch2->fetch_assoc()){
            if($row['privilege']=="admin"){
                $result=true;
            }else{
                $result=false;
            }           
        }
    }else{
        $result=false;

}
return $result;
}

function get_last_seen($user_id){
    global $conn;
    global $created_at;
    $query_fg=$conn->query("select last_activity from users where id='".$user_id."'");
    if($query_fg->num_rows==1){
        while($row=$query_fg->fetch_assoc()){
        $last_activity=$row['last_activity'];
        }
    }else{
        $last_activity="unavailable";
    }
$result=floor((strtotime($created_at)-strtotime($last_activity))/60);
if($result>=30){
$rep="status off-online";
}else if($result>=15 && $result<30){      
$rep="status f-away";
}else{
$rep="status f-online";
}
return $rep;
}
function get_last_seen_status($user_id){
    global $conn;
    global $created_at;
    $query_fg=$conn->query("select last_activity from users where id='".$user_id."'");
    if($query_fg->num_rows==1){
        while($row=$query_fg->fetch_assoc()){
        $last_activity=$row['last_activity'];
        }
    }else{
        $last_activity="unavailable";
    }
$result=floor((strtotime($created_at)-strtotime($last_activity))/60);
if($result>=30){
$rep="offline";
}else if($result>=15 && $result<30){      
$rep="away";
}else{
$rep="online";
}
return $rep;
}



   

function array_element_remove($element,$list){
foreach (array_keys($list, $element) as $key) {
    unset($list[$key]);
}
return implode(',',$list);
}



function uri($vals){
    $numero=strlen($vals);
$paged1=basename($_SERVER['REQUEST_URI']); 
if(substr($paged1,0,$numero)===$vals){
    return true;
}else{
    return false;
}
}
?>