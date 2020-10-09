<?php


require 'conn.php';

$out = '';
if(isset($_POST['size'])){

    $out .='<form class="block-finder__form"  method="GET" action="shop-list">
    <div class="block-finder__form-control block-finder__form-control--select"><select name="width" id="sizeWidth"
            aria-label="Vehicle Year">
            <option value="none">Select Width</option>';
            $sql = $conn->query("SELECT * FROM `tx_tyrespecifications` GROUP BY front_width ORDER BY front_width");
            if($sql->num_rows>0){
                while($row=$sql->fetch_assoc()){
                    $out .= '<option>'.$row['front_width'].'</option>';
                }
            }

         $out .='
        </select></div>
    <div class="block-finder__form-control block-finder__form-control--select"><select name="profile" id="sizeProfile"
            aria-label="Vehicle Make" disabled="disabled">
            <option value="none">Select Profile</option>
            
        </select></div>
    <div class="block-finder__form-control block-finder__form-control--select"><select name="rim" id="sizeRim"
            aria-label="Vehicle Model" disabled="disabled">
            <option value="none">Select Rim</option>

        </select></div>

    <button class="block-finder__form-control block-finder__form-control--button"
        type="submit">Search</button>
</form>';


}elseif(isset($_POST['name'])) {
    $out .='<form class="block-finder__form"  method="GET" action="shop-list">
    <div class="block-finder__form-control block-finder__form-control--select">
            <select name="make"  id="yearMake"
            aria-label="Vehicle Make">
            <option value="none">Select Make</option>';
            $sql = $conn->query("SELECT vendor FROM `tx_carmodels` GROUP BY vendor ORDER BY vendor");
           if($sql->num_rows>0){
               while($row=$sql->fetch_assoc()){
                   $out .= '
                   <option value="'.$row['vendor'].'">'.$row['vendor'].'</option>
                   ';
               }
           }
           
           $out .='
            
            
        </select></div>

        <div class="block-finder__form-control block-finder__form-control--select"><select name="model" id="vehicleYear"
        aria-label="Vehicle Model" disabled="disabled">
        <option value="none">Select Model</option>
        
    </select></div>

    <div class="block-finder__form-control block-finder__form-control--select" >
    <select name="year" aria-label="Vehicle year" disabled="disabled" id="yearModel">
            <option value="none">Select Year</option>
            
            </select></div>

    
    
            
   
    
    <button class="block-finder__form-control block-finder__form-control--button"
        type="submit">Search</button>
</form>'; 

}elseif(isset($_POST['budget'])){
    $out .= '<form class="block-finder__form"  method="GET" action="shop-list">
    <div class="block-finder__form-control block-finder__form-control--select"><select name="budgett" id="budget"
            aria-label="Vehicle Year">
            <option value="none">Select Budget</option>
            <option value="Premium">Premium</option>
            <option value="Quality">Quality</option>
            <option value="Economy">Economy</option>
            <option value="Budget">Budget</option>
        </select></div>
    <div class="block-finder__form-control block-finder__form-control--select"><select name="widtht" id="width"
            aria-label="Vehicle Make" disabled="disabled">
            <option value="none">Select Width</option>';
            $sql = $conn->query("SELECT * FROM `tx_tyrespecifications` WHERE front_width !=0 GROUP BY front_width ORDER BY front_width");
            if($sql->num_rows>0){
                while($row=$sql->fetch_assoc()){
                    if($row['front_width']!=''){
                $out .= '<option value="'.$row['front_width'].'">'.$row['front_width'].'</option>';
                }
            }
            }

            $out .=' </select></div>
    <div class="block-finder__form-control block-finder__form-control--select"><select name="profilet" id="profile"
            aria-label="Vehicle Model" disabled="disabled">
            <option value="none">Select Profile</option>';
            $sql = $conn->query("SELECT * FROM `tx_tyrespecifications` WHERE front_profile !=0  GROUP BY front_profile ORDER BY front_profile");
                if($sql->num_rows>0){
                    while($row=$sql->fetch_assoc()){
                        if($row['front_profile']!=''){
                        $out .= '<option value="'.$row['front_profile'].'">'.$row['front_profile'].'</option>';
                    }
                }
                }
       $out .='    
        </select></div>
    <div class="block-finder__form-control block-finder__form-control--select"><select name="rimt" id="rim"
            aria-label="Vehicle Engine" disabled="disabled">
            <option value="none">Select Rim</option>';
            $sql = $conn->query("SELECT * FROM `tx_tyrespecifications` WHERE front_diameter !=0  GROUP BY front_diameter ORDER BY front_diameter");
                if($sql->num_rows>0){
                    while($row=$sql->fetch_assoc()){
                        if($row['front_diameter']!=''){
                         $out .= '<option value="'.$row['front_diameter'].'">'.$row['front_diameter'].'</option>';
                    }
                }
                }
            
            $out .='</select></div><button class="block-finder__form-control block-finder__form-control--button"
        type="submit">Search</button>
</form>';

}elseif(isset($_POST['brand'])){
    $out .= '<form class="block-finder__form"  method="GET" action="shop-list">
    <div class="block-finder__form-control block-finder__form-control--select"><select name="brand" id="brand"
            aria-label="Vehicle Year">
            <option value="none">Select Brand</option>';
            $list=$conn->query("SELECT * from brands where status='active' AND dcategory='Tyres and Tubes' order by name");
                if($list->num_rows>=1){
                while($rows=$list->fetch_assoc()){ 
                 $out .='<option value="'.$rows['name'].'">'.$rows['name'].'</option>';
                }
                }

         $out .='
        </select></div>
    <div class="block-finder__form-control block-finder__form-control--select"><select name="width" id="width"
            aria-label="Vehicle Make" disabled="disabled">
            <option value="none">Select Width</option>';
            $sql = $conn->query("SELECT * FROM `tx_tyrespecifications` WHERE front_width !=0 GROUP BY front_width ORDER BY front_width");
            if($sql->num_rows>0){
                while($row=$sql->fetch_assoc()){
                    if($row['front_width']!=''){
                $out .= '<option value="'.$row['front_width'].'">'.$row['front_width'].'</option>';
                }
            }
            }

            $out .=' </select></div>
    <div class="block-finder__form-control block-finder__form-control--select"><select name="profile" id="profiles"
            aria-label="Vehicle Model" disabled="disabled">
            <option value="none">Select Profile</option>';
            $sql = $conn->query("SELECT * FROM `tx_tyrespecifications` WHERE front_profile !=0  GROUP BY front_profile ORDER BY front_profile");
                if($sql->num_rows>0){
                    while($row=$sql->fetch_assoc()){
                        if($row['front_profile']!=''){
                        $out .= '<option value="'.$row['front_profile'].'">'.$row['front_profile'].'</option>';
                    }
                }
                }
       $out .='    
        </select></div>
    <div class="block-finder__form-control block-finder__form-control--select"><select name="rim" id="rim"
            aria-label="Vehicle Engine" disabled="disabled">
            <option value="none">Select Rim</option>';
            $sql = $conn->query("SELECT * FROM `tx_tyrespecifications` WHERE front_diameter !=0  GROUP BY front_diameter ORDER BY front_diameter");
                if($sql->num_rows>0){
                    while($row=$sql->fetch_assoc()){
                        if($row['front_diameter']!=''){
                         $out .= '<option value="'.$row['front_diameter'].'">'.$row['front_diameter'].'</option>';
                    }
                }
                }
            
            
            $out .='</select></div><button class="block-finder__form-control block-finder__form-control--button"
        type="submit">Search</button>
</form>';

}elseif(isset($_POST['searchWidth'])){
    $id = $_POST["id"];
            $sql = $conn->query("SELECT width FROM `tx_carmodels` WHERE vendor='$id' GROUP BY width ORDER BY width");
            if($sql->num_rows>0){
                $out .= '
                    <option value="none">Select Width</option>';
                while($row=$sql->fetch_assoc()){
                    $out .= '
                    <option value="'.$row['width'].'">'.$row['width'].'</option>
                    ';
                }
            }

        
}elseif(isset($_POST['searchProfile'])){
    $id = $_POST["id"];
            $sql = $conn->query("SELECT profile FROM `tx_carmodels` WHERE vendor='$id' GROUP BY profile ORDER BY profile");
            if($sql->num_rows>0){
                $out .= '
                    <option value="none">Select Profile</option>';
                while($row=$sql->fetch_assoc()){
                    $out .= '
                    <option value="'.$row['profile'].'">'.$row['profile'].'</option>
                    ';
                }
            }

        
}elseif(isset($_POST['searchRim'])){
    $id = $_POST["id"];
            $sql = $conn->query("SELECT rim FROM `tx_carmodels` WHERE vendor='$id' GROUP BY rim ORDER BY rim");
            if($sql->num_rows>0){
                $out .= '
                    <option value="none">Select Rim</option>';
                while($row=$sql->fetch_assoc()){
                    $out .= '
                    <option value="'.$row['rim'].'">'.$row['rim'].'</option>
                    ';
                }
            }

        
}elseif(isset($_POST['sizeProfile'])){
    $id = $_POST["id"];
            $sql = $conn->query("SELECT front_profile FROM `tx_tyrespecifications` WHERE front_width='$id' AND front_profile !=0 GROUP BY front_profile ORDER BY front_profile");
            if($sql->num_rows>0){
                $out .= '
                    <option value="none">Select Profile</option>';
                while($row=$sql->fetch_assoc()){
                    $out .= '
                    <option value="'.$row['front_profile'].'">'.$row['front_profile'].'</option>
                    ';
                }
            }

        
}elseif(isset($_POST['sizeRim'])){
    $id = $_POST["id"];
            $sql = $conn->query("SELECT front_diameter FROM `tx_tyrespecifications` WHERE front_width='$id' GROUP BY front_diameter ORDER BY front_diameter");
            if($sql->num_rows>0){
                $out .= '
                    <option value="none">Select Rim</option>';
                while($row=$sql->fetch_assoc()){
                    $out .= '
                    <option value="'.$row['front_diameter'].'">'.$row['front_diameter'].'</option>
                    ';
                }
            }

        
}elseif(isset($_POST['yearVehicle'])){
    $id = $_POST["id"];
            $sql = $conn->query("SELECT model FROM `tx_carmodels` WHERE vendor='$id' GROUP BY model ORDER BY model");
            if($sql->num_rows>0){
                $out .= '
                    <option value="none">Select Model</option>';
                while($row=$sql->fetch_assoc()){
                    $out .= '
                    <option value="'.$row['model'].'">'.$row['model'].'</option>
                    ';
                }
            }

        
}elseif(isset($_POST['yearMake'])){
    $id = $_POST["id"];
           
            $date = date("Y");
            $star = '1999';
            $sql = $conn->query("SELECT * FROM `tx_carmodels` WHERE vendor='$id' AND year BETWEEN '$star' AND '$date' GROUP BY year  ORDER BY year DESC");
            if($sql->num_rows>0){
                $out .= '
                    <option value="none">Select Year</option>';
                while($row=$sql->fetch_assoc()){
                   $out .= '<option value="'.$row['year'].'">'.$row['year'].'</option>';
                }
            }


        
}


echo $out;