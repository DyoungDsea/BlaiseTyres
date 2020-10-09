<?php

if ($foo->uploaded) {   
   // save uploaded image with a new name,
   // resized to 100px wide
   $foo->file_new_name_body = $picid;
   $foo->image_resize = true;
   $foo->image_convert = 'jpg';
   $foo->image_x = 700;
   $foo->image_y = 700;
   $foo->Process('../_product_images');
   if ($foo->processed) {
     $foo->Clean();
   }  
}
?>