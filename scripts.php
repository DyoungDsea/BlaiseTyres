<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendor/nouislider/nouislider.min.js"></script>
	<script src="vendor/photoswipe/photoswipe.min.js"></script>
	<script src="vendor/photoswipe/photoswipe-ui-default.min.js"></script>
	<script src="vendor/select2/js/select2.min.js"></script>
	<script src="js/number.js"></script>
	<script src="js/main.js"></script>
	<script src="tyre.js"></script>
  <script src="js/toastr.min.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>

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

// (function() {
//     $('form > input').keyup(function() {

//         var empty = false;
//         $('form > input').each(function() {
//             if ($(this).val() == '') {
//                 empty = true;
//             }
//         });

//         if (empty) {
//             $('#register').attr('disabled', 'disabled'); 
//         } else {
//             $('#register').removeAttr('disabled'); 
//         }
//     });
// })()



function buttonState(){
    $("input").each(function(){
        $('#register').attr('disabled', 'disabled');
        if($(this).val() == "" ) return false;
        $('#register').attr('disabled', '');
    })
}

$(function(){
    $('#register').attr('disabled', 'disabled');
    $('input').change(buttonState);
})

</script>

<script >
$(document).ready(function(){

  $(document).on("keyup", "#signin-password", function(){
    // alert("yes");
    var value1 = $("#signin-password").val();
    var value2 = $("#signin-passwordc").val();

    if (value1 =='' ) {
      $('#signin-passwordc').prop("disabled", true);
    }else{
        if(value1.length <=3){
          $('#signin-passwordc').prop("disabled", true);
        }else{
        $('#signin-passwordc').prop("disabled", false);
        }
    }

    }) 

  $(document).on("keyup", "#signin-passwordc", function(){
    // alert("yes");
    var value1 = $("#signin-password").val();
    var value2 = $("#signin-passwordc").val();

    if(value2.length > 0){
      $("#signin-password").prop("disabled", true);
      if (value1 === value2 ) {
        $('#reset').prop("disabled", false);
        $("#signin-password").prop("disabled", false);
      }else{
          $('#reset').prop("disabled", true);
      }
      
    }else if (value2 =='' ) {
      $("#signin-password").prop("disabled", false);
    }

    })   


  });

  function pageValidation(){
    var valid=true;
    var pageNo = $('#page-no').val();
    var totalPage = $('#total-page').val();
    if(pageNo == ""|| pageNo < 1 || !pageNo.match(/\d+/) || pageNo > parseInt(totalPage)){
        $("#page-no").css("border-color","#ee0000").show();
        valid=false;
    }
    return valid;
  }

    </script>