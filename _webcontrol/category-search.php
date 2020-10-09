<?php 

require("../conn.php");


$out ='';
if(isset($_POST['searchSub'])){
    $category = $conn->real_escape_string($_POST['id']);
    $list=$conn->query("SELECT * from sub_categories where dcategory='$category' AND status='active' order by name");
    if($list->num_rows>=1){
        $out .='
      <option value="">Choose Sub Category</option>';
      while($rows=$list->fetch_assoc()){ 
      $out .='<option value="'.$rows['name'].'">'.$rows['name'].'</option>';
     }
    }
}elseif(isset($_POST['searchBrand'])){
    $category = $conn->real_escape_string($_POST['id']);
    $list=$conn->query("SELECT * from brands where dcategory='$category' AND status='active' order by name");
    if($list->num_rows>=1){
        $out .='<option value="">Choose Brand</option>';
      while($rows=$list->fetch_assoc()){ 
      $out .='<option value="'.$rows['name'].'">'.$rows['name'].'</option>';
     }
    }
}elseif(isset($_POST['searchTyre'])){
    
    $out .='
    <div class="col-md-4">
    <div class="form-group required-field">
        <label>Width</label>
        <select class="form-control form-control-sm" required name="width">
        <option value="">Select Width</option>';            
            $sql = $conn->query("SELECT * FROM `tx_tyrespecifications` GROUP BY front_width ORDER BY front_width");
            if($sql->num_rows>0){
                while($row=$sql->fetch_assoc()){
                    $out .= '<option>'.$row['front_width'].'</option>';
                }
            }
         $out .='
        </select>
    </div>
    </div>

    <div class="col-md-4">
    <div class="form-group required-field">
        <label>Profile</label>
        <select class="form-control form-control-sm" required name="profile">
        <option value="">Select Profile</option>';
            $sql = $conn->query("SELECT * FROM `tx_tyrespecifications` GROUP BY front_profile ORDER BY front_profile");
            if($sql->num_rows>0){
                while($row=$sql->fetch_assoc()){
                    if($row['front_profile']!=''){
                    $out .= '<option value="'.$row['front_profile'].'">'.$row['front_profile'].'</option>';
                }
            }
            }

         $out .='
        </select>
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group required-field">
        <label>Rim</label>
        <select name="rim" class="form-control form-control-sm">
        <option value="">Choose Rim</option>';
        $sql = $conn->query("SELECT * FROM `tx_tyrespecifications` GROUP BY front_diameter ORDER BY front_diameter");
        if($sql->num_rows>0){
            while($row=$sql->fetch_assoc()){
                if($row['front_diameter']!=''){
                $out .= '<option value="'.$row['front_diameter'].'">'.$row['front_diameter'].'</option>';
            }
        }
        }

     $out .='                            
        </select>
    </div>

    </div>

    <div class="col-md-12">
    <div class="form-group required-field" required>
        <label>Budget Type</label>
        <select name="bud" class="form-control form-control-sm">
        <option value="">Choose Budget Type</option>
        <option value="Premium">Premium</option>
        <option value="Quality">Quality</option>
        <option value="Economy">Economy</option>
        <option value="Budget">Budget</option>
                                            
        </select>
    </div>
    </div>
    ';
}elseif(isset($_POST['searchFirst'])){
    $out .='<input type="number" name="one1" value="0" pattern="[0-9]" placeholder="eg 1-100" class="form-control form-control-sm" required>';
}elseif(isset($_POST['searchFirsts'])){
    $out .='<input type="number" name="one2" value="0" pattern="[0-9]" placeholder="eg 1-100" class="form-control form-control-sm" required>';
}elseif(isset($_POST['searchFirstx'])){
    $out .='<input type="number" name="one3" value="0" pattern="[0-9]" placeholder="eg 1-100" class="form-control form-control-sm" required>';
}elseif(isset($_POST['searchFirstz'])){
    $out .='<input type="number" name="one4" value="0" pattern="[0-9]" placeholder="eg 1-100" class="form-control form-control-sm" required>';
}




 echo $out;   

?>