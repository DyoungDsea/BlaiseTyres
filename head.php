<?php

@session_cache_expire(120);
@ini_set('session.gc_maxlifetime', 7200); 

include("conn.php");
require 'star-rating.php';

	if(isset($_SESSION['transid'])){
		$transid=$_SESSION['transid'];
	}else{
		$transid=date('ymdHis');
		$_SESSION['transid']=$transid;
	}


?>
<!DOCTYPE html><html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
		<?php 
if(isset($dcat)){ ?>
	<title>Blaise Autocare :: Products <?php echo $dcat; ?></title>
<?php }else{ ?>
	<title>Blaise Autocare :: Home :: Tyres | Lubricants | Auto Batteries</title>

<?php }
		?>
        <meta name="description" content="Blaise Autocare :: Home :: Tyres | Lubricants | Auto Batteries">
		<meta name="description" content="Buy Tyres in Nigeria online, Buy Lubricants in Nigeria, Auto Batteries in Lagos, Port Harcourt, Abuja, Nigeria">
		<meta name="description" content="Car Tyres in Nigeria Auto care, Car mechanic, Auto Batteries Sales, Lagos, Port Harcourt, Abuja, Nigeria">
		<style>
		.dodo{
			color:#007bff!important;
		}
		.dodoi{
			background-image: url('images/posts/post-1-1903x500.jpg');
		}

		.shoplist{
			/* padding:5px;  */
			text-align:center
		}

		@media only screen and (max-width: 992px){
			.setimage a img{
				max-width:100%;
			}

			
			}


			
input.enter-page-no {
	width: 42px !important;
	height: 28px !important;
	font-size: 12px;
	padding: 6px 12px 6px 12px !important;
	margin: 6px;
	border-radius: 3px !important;
	text-align: center !important;
}

input.goto-button {
	max-width: 80px;
	font-size: 12px;
	padding: 6px 12px 6px 12px !important;
	border-radius: 3px !important;
	text-align: center !important;
	background:#e52727;
    border: none;
	color:white;
}

.numbers{
	background:#000040;
	color:white;
	padding:4px;
	border-radius:20px;
	margin-right:10px
}

#ship{
	display:none;
	margin-top:10px;
}


.blaise-form{
	display:none;
}

		</style>
		<link rel="icon" href="images/blaise.jpeg">
        <link rel="apple-touch-icon" href="assets/img/color-1/template/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/color-1/template/icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/color-1/template/icon-114x114.png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i"><!-- css -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="vendor/owl-carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="vendor/photoswipe/photoswipe.css">
		<link rel="stylesheet" href="vendor/photoswipe/default-skin/default-skin.css">
		<link rel="stylesheet" href="vendor/select2/css/select2.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style.header-classic-variant-five.css" media="(min-width: 1200px)">
		<link href="css/sweetalert2.min.css" rel="stylesheet">
		<link href="css/toastr.min.css" rel="stylesheet">

		<link rel="stylesheet" href="css/style.mobile-header-variant-one.css" media="(max-width: 1199px)">
	
	<!-- font - fontawesome -->
	<link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
	<script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag("js", new Date()); gtag("config", "UA-97489509-8");</script>
</head>