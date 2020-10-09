<?php

if ($foo->uploaded) {   
   // save uploaded image with a new name,
   // resized to 100px wide
   $foo->file_new_name_body = $picid;
   $foo->image_resize = true;
   $foo->image_convert = 'jpg';
   $foo->image_x = 730;
   $foo->image_y = 485;
   $foo->Process('../_slide_blog');
   if ($foo->processed) {
     $foo->Clean();
   }  
}
?>