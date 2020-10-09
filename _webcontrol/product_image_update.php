<?php
$id=$_POST['id'];
require('../conn.php');
$queryz=$conn->query("SELECT dimg1, dimg2, dimg3, dimg4 from products where dpid='".$id."'");
$row=$queryz->fetch_assoc();
?>
<table class="table table-striped">
<input type="hidden" name="id" value="<?php echo $id; ?>">

    <tr>
    <td style="width:50px;">
    <p>Choose Product Image (Optional)</p>
    <input type="file" name="first" class="form-control-file" onchange="fire(this)">
    <input type="hidden" name="oldfirst" value="<?php echo $row['dimg1']; ?>">    
    </td>
    <td style="width:50px;">
    <img style="height:100px;width:100px;" src="../_product_images/<?php echo $row['dimg1']; ?>" alt="">
    </td>

    </tr>

    <tr>
    <td style="width:50px;">
    <p>Choose Product Image (Optional)</p>
    <input type="file" name="second" class="form-control-file" onchange="fire(this)">
    <input type="hidden" name="oldsecond" value="<?php echo $row['dimg2']; ?>">    
    </td>
    <td style="width:50px;">
    <img style="height:100px;width:100px;" src="../_product_images/<?php echo $row['dimg2']; ?>" alt="">
    </td>

    </tr>

    <tr>
    <td style="width:50px;">
    <p>Choose Product Image (Optional)</p>
    <input type="file" name="third" class="form-control-file" onchange="fire(this)">
    <input type="hidden" name="oldthird" value="<?php echo $row['dimg3']; ?>">    
    </td>
    <td style="width:50px;">
    <img style="height:100px;width:100px;" src="../_product_images/<?php echo $row['dimg3']; ?>" alt="">
    </td>

    </tr>

    <tr>
    <td style="width:50px;">
    <p>Choose Product Image (Optional)</p>
    <input type="file" name="last" class="form-control-file" onchange="fire(this)">
    <input type="hidden" name="oldlast" value="<?php echo $row['dimg4']; ?>">    
    </td>
    <td style="width:50px;">
    <img style="height:100px;width:100px;" src="../_product_images/<?php echo $row['dimg4']; ?>" alt="">
    </td>

    </tr>
    
</table>