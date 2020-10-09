<?php

//action.php

session_start();

if(isset($_POST["addCart"])){
	if($_POST["action"] == "add"){
		
		if(isset($_SESSION["budget"])){
			$is_available = 0;
			foreach($_SESSION["budget"] as $keys => $values){
				if($_SESSION["budget"][$keys]['id'] == $_POST["id"]){
					$is_available++;
					$_SESSION["budget"][$keys]['qty'] +=  $_POST["qty"];
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
					'vcode' => $_POST["vcode"] //product vendor code
                    
				);
				$_SESSION["budget"][] = $item_array;
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
                'vcode' => $_POST["vcode"] //product vendor code
			);
			$_SESSION["budget"][] = $item_array;
			$_SESSION['smsc'] = "<p class='text-success'>&#10004; Item added to cart successfully</p>";
		}
	}

	
}

$out = '';
    if($_POST["action"] == 'remove'){
		foreach($_SESSION["budget"] as $keys => $values){
			if($values["id"] == $_POST["id"]){
				unset($_SESSION["budget"][$keys]);
				unset($_SESSION['coupon']);	
				unset($_SESSION['cart-total']);
			}
		}
    }
    
	// if($_POST["action"] == 'empty'){
	// 	unset($_SESSION["budget"]);
	// 	// unset($_SESSION['transid']);
	// }


// echo $_SESSION["blevim"];

//Add to session qty
if(isset($_POST["plusbudget"])){
	$id = $_POST["id"];
	foreach($_SESSION["budget"] as $keys => $values){
		if($values["id"] == $id){
			$_SESSION["budget"][$keys]['qty'] += 1;
			unset($_SESSION['coupon']);
			unset($_SESSION['cart-total']);
			}
		}
}

//Minus from session qty
if(isset($_POST["minusbudget"])){
	$id = $_POST["id"];
	foreach($_SESSION["budget"] as $keys => $values){
		if($values["id"] == $id){
			$_SESSION["budget"][$keys]['qty'] -= 1;
			if($_SESSION["budget"][$keys]['qty'] <= 0){
				$_SESSION["budget"][$keys]['qty'] = 1;
				unset($_SESSION['coupon']);
				unset($_SESSION['cart-total']);
			}
		}
	}
}

if (isset($_POST["cancel"])) {
	unset($_SESSION["budget"]);
	unset($_SESSION['coupon']);
	unset($_SESSION['cart-total']);
}

?>