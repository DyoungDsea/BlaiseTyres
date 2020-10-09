
   <script src="vendor/jquery/jquery.min.js"></script>
  <script src="../js/toastr.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../datepicker/jquery-ui.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <script src="../shared/materialize.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <script src="js/blevi.js"></script>
  <script src="tyre.js"></script>
  <script src="../image_upload/load-image.all.min.js"></script>
  <script src="../js/sweetalert2.all.min.js"></script>
 <script>
 function fire(f){
   var image= f.files[0];
   var rep=f.parentNode.nextSibling.nextSibling;
   var rep2=f.parentNode.nextSibling.nextSibling.childNodes[1];
      loadImage(image,function(img){
         rep.replaceChild(img,rep2);
      },{maxWidth:100,maxHeight:100});
 }
 </script>

 <script>
//  $(document).ready(function(){
//    var x = $(".btn");
//   //  x.preventDefault();
//  })
 </script>
  <script>
  $(function(){
            $('.datepicker').datepicker({
                dateFormat:'yy-mm-dd',
              });
            $('.sweep').click(function(){
              $('.datepicker').datepicker("show");
            });
            $('.datepicker2').datepicker({
                dateFormat:'yy-mm-dd',
              });
            $('.sweep2').click(function(){
              $('.datepicker2').datepicker("show");
            });
    });
    
         </script>
           <script>
           CKEDITOR.replace('ckeditor2',{
                  resize_enabled:false,
                  resize_maxheight:'500'
                  });
                  CKEDITOR.replace('ckeditorx',{
                  resize_enabled:false,
                  resize_maxheight:'500'
                  });
                  
    </script>
  <?php
    if(isset($_SESSION['msg'])){ ?>
    <script> 
    toastr.options = {
      "debug": false,
      "positionClass": "toast-bottom-right",
      "onClcik":null,
      "fadeIn":300,
      "fadeOut":1000,
      "timeOut":5000,
      "extendedTimeOut":1000
    }
    toastr.error("<?php echo $_SESSION['msg']; ?>"); 
    </script>
    <?php
unset($_SESSION['msg']);
  } ?>

  <script>
document.querySelectorAll(".delz").forEach(function(d){
d.addEventListener("click",function(g){
  document.querySelector(".delzv").href=g.target.dataset.delete_id;
});
});

document.querySelectorAll(".delz").forEach(function(d){
d.addEventListener("click",function(g){
  document.querySelector(".delzr").href=g.target.dataset.delete_id;
});
});

document.querySelectorAll(".delz").forEach(function(d){
d.addEventListener("click",function(g){
  document.querySelector(".delzm").href=g.target.dataset.delete_id;
});
});


</script>

<?php
    if(isset($_SESSION['msgs'])){ ?>
    <script> 
    toastr.options = {
      "debug": false,
      "positionClass": "toast-bottom-right",
      "onClcik":null,
      "fadeIn":300,
      "fadeOut":1000,
      "timeOut":5000,
      "extendedTimeOut":1000
    }
    toastr.success("<?php echo $_SESSION['msgs']; ?>"); 
    </script>
    <?php
unset($_SESSION['msgs']);
  } ?>


<script>
  var allElement = document.querySelectorAll('.ckeditor');
      for (let i = 0; i < allElement.length; i++) {
        ClassicEditor.create(allElement[i])
        .catch( error => {
            console.error( error );
        } );
        
      }
      
       ClassicEditor.create(document.querySelector( '#editorp' ));


        
 </script>