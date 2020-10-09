<?php

//action.php

session_start();
if(isset($_POST["increaseTotal"])){
	$charge = $_POST['id'];
}else{
$charge = 0;
}

if(isset($_POST["addSub"])){
	if($_POST["action"] == "sub"){
		
		if(isset($_SESSION["subscribe"])){
			$is_available = 0;
			foreach($_SESSION["subscribe"] as $keys => $values){
				if($_SESSION["subscribe"][$keys]['id'] == $_POST["id"]){
					$is_available++;
					$_SESSION["subscribe"][$keys]['qty'] +=  $_POST["qty"];
					$_SESSION['smsc'] = "<p class='text-success'>&#10004; Item added to cart successfully</p>";
				}
			}
			if($is_available == 0){
				$item_array = array(
					'id' => $_POST["id"],  //product id
					'name' => $_POST["name"],  //product name
					'price' => $_POST["price"],  //product price
                    'qty' => $_POST["qty"], //product quantity
					'img' => $_POST["img"], //product image
					'brand' => $_POST["brand"], //product brand
                    'sku' => $_POST["sku"], //product sku
					'vcode' => $_POST["vcode"], //product vendor code
					'plan' => $_POST["plan"], //product plan
                    'planNum' => $_POST["planNum"] //product planNum
                    
				);
				$_SESSION["subscribe"][] = $item_array;
				$_SESSION['smsc'] = "<p class='text-success'>&#10004; Item added to cart successfully</p>";
			}
		}
		else
		{
			$item_array = array(
                'id' => $_POST["id"],  //product id
                'name' => $_POST["name"],  //product name
                'price' => $_POST["price"],  //product price
                'qty' => $_POST["qty"], //product quantity
                'img' => $_POST["img"], //product image
                'brand' => $_POST["brand"], //product brand
                'sku' => $_POST["sku"], //product sku
                'vcode' => $_POST["vcode"], //product vendor code
                'plan' => $_POST["plan"], //product plan
                'planNum' => $_POST["planNum"] //product planNum
			);
			$_SESSION["subscribe"][] = $item_array;
			$_SESSION['smsc'] = "<p class='text-success'>&#10004; Item added to cart successfully</p>";
		}
	}

	
}

$out = '';
    if($_POST["action"] == 'remove'){
		foreach($_SESSION["subscribe"] as $keys => $values){
			if($values["id"] == $_POST["id"]){
				unset($_SESSION["subscribe"][$keys]);
				unset($_SESSION['coupons']);				
			}
		}
    }
    
	// if($_POST["action"] == 'empty'){
	// 	unset($_SESSION["subscribe"]);
	// 	// unset($_SESSION['transid']);
	// }


// echo $_SESSION["blevim"];

//Add to session qty
if(isset($_POST["plussubscribe"])){
	$id = $_POST["id"];
	foreach($_SESSION["subscribe"] as $keys => $values){
		if($values["id"] == $id){
			$_SESSION["subscribe"][$keys]['qty'] += 1;
			unset($_SESSION['coupons']);
			}
		}
}

//Minus from session qty
if(isset($_POST["minussubscribe"])){
	$id = $_POST["id"];
	foreach($_SESSION["subscribe"] as $keys => $values){
		if($values["id"] == $id){
			$_SESSION["subscribe"][$keys]['qty'] -= 1;
			if($_SESSION["subscribe"][$keys]['qty'] <= 0){
				$_SESSION["subscribe"][$keys]['qty'] = 1;
				unset($_SESSION['coupons']);
			}
		}
	}
}

if (isset($_POST["cancel"])) {
	unset($_SESSION["subscribe"]);
	unset($_SESSION['coupons']);
	// unset($_SESSION['transid']);
}


//Increase Grand Total 
if(isset($_POST["increaseTotal"])){
	$id = $_POST["id"];
	foreach($_SESSION["subscribe"] as $keys => $values){
		if($values["id"] == $id){
			$_SESSION["subscribe"][$keys]['qty'] += 1;
			}
		}
}

?>