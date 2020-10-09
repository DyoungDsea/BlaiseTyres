<?php

//action.php

session_start();

if(isset($_POST["addCompare"])){
	if($_POST["action"] == "add"){
		
		if(isset($_SESSION["compare"])){
			$is_available = 0;
			foreach($_SESSION["compare"] as $keys => $values){
				if($_SESSION["compare"][$keys]['id'] == $_POST["id"]){
					$is_available++;
					$_SESSION["compare"][$keys]['qty'] +=  $_POST["qty"];
				}
			}
			if($is_available == 0){
				$item_array = array(
					'id' => $_POST["id"],  //product id
					'name' => $_POST["name"],  //product name
					'price' => $_POST["price"],  //product price
					'img' => $_POST["img"], //product image
                    'sku' => $_POST["sku"], //product sku
                    'brand' => $_POST["brand"], //product brand
                    'avaliable' => $_POST["avaliable"], //product avaliable
					'vcode' => $_POST["vcode"] //product vendor code
                    
				);
				$_SESSION["compare"][] = $item_array;
			}
		}else{
			$item_array = array(
                'id' => $_POST["id"],  //product id
                'name' => $_POST["name"],  //product name
                'price' => $_POST["price"],  //product price
                'img' => $_POST["img"], //product image
                'sku' => $_POST["sku"], //product sku
                'brand' => $_POST["brand"], //product brand
                'avaliable' => $_POST["avaliable"], //product avaliable
                'vcode' => $_POST["vcode"] //product vendor code
			);
			$_SESSION["compare"][] = $item_array;
		}
	}

	
}

$out = '';
    if($_POST["action"] == 'remove'){
		foreach($_SESSION["compare"] as $keys => $values){
			if($values["id"] == $_POST["id"]){
				unset($_SESSION["compare"][$keys]);				
			}
		}
    }
    
	if($_POST["action"] == 'empty'){
		unset($_SESSION["compare"]);
		// unset($_SESSION['transid']);
	}



if (isset($_POST["cancel"])) {
	unset($_SESSION["compare"]);
	// unset($_SESSION['transid']);
}

?>