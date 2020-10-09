<?php

if ($foo->uploaded) {   
   // save uploaded image with a new name,
   // resized to 100px wide
   $foo->file_new_name_body = $picid;
   $foo->image_resize = true;
   $foo->image_convert = 'jpg';
   $foo->image_x = 510;
   $foo->image_y = 480;
   $foo->Process('../_slide_images');
   if ($foo->processed) {
     $foo->Clean();
   }  
}

?>