<?php
session_start();
require("../conn.php");
if(isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])){
$query=$conn->query("select * from login where id='".$_POST['id']."'");
if($query->num_rows==1){
    while($row=$query->fetch_assoc()){ ?>
<div class="form-group required-field">
<label>Account Name</label>
<input type="hidden" name="referral_id" value="<?php echo $row['referral_id']; ?>" required>
<input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control form-control-sm" required>
</div>
<div class="form-group required-field">
<label>Email Address</label>
<input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control form-control-sm" required>
</div>
<div class="form-group required-field">
<label>Phone Number</label>
<input type="phone" name="phone" value="<?php echo $row['phone']; ?>" class="form-control form-control-sm" required>
</div>
<div class="form-group required-field">
<label>Address</label>
<textarea class="form-control" required name="address" cols="30" rows="4"><?php echo $row['address']; ?></textarea>
</div>

<div class="form-group required-field">
<label>Level</label>
<select name="level" required class="form-control">
<?php
$query1=$conn->query("select * from levels");
if($query1->num_rows>=1){
while($row2=$query1->fetch_assoc()){ ?>
<option <?php if($row2['level']===$row['level']){ echo "selected"; } ?> value="<?php echo $row2['level']; ?>"><?php echo ucwords($row2['level']); ?></option>
<?php }
}else{ ?>
<option>No level available</option>
<?php }
?>
</select>
</div>
   <?php }
}
}else{
    header("Location: index");
}
?>