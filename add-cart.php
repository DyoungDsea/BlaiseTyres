<?php
session_start();

$out = '';
$page = '';
$topc = '';
$topct = '';
if(isset($_POST['SumTotal'])){



    $id = (Float)$_POST['id'];
        $total = 0;
        $qty = 0;
        foreach($_SESSION["budget"] as $keys => $values){
           $total += $id;
           $qty += $values['qty'];
           
        }
        $topct .= '&#8358;'.number_format($total * $qty ,2);
        
        if(isset($_SESSION['coupon'])){
             $totals =((Float)$_SESSION['coupon'] + ($total * $qty));
             $_SESSION['grandx']=(Float)$_SESSION['coupon'] + ($total * $qty);
        }else{
            $totals =((Float)$_SESSION['cart-total'] + ($total * $qty));
            $_SESSION['grandx']=(Float)$_SESSION['cart-total'] + ($total * $qty);
        }
        // $totals =((Float)$_SESSION['cart-total'] + $total);
       

        $topc .=  '&#8358;'.number_format($totals,2);


        $_SESSION['locationx']=$_POST['text'];
        $_SESSION['costx']=$total * $qty;
        $_SESSION['costsx']=$id;




    $page .='
    <div class="card-body card-body--padding--2"><h3 class="card-title">Method of Payment</h3>
    <div class="checkout__payment-methods payment-methods">
        <ul class="payment-methods__list">

            <li class="payment-methods__item payment-methods__item--active">
                <label class="payment-methods__item-header">
                    <span class="payment-methods__item-radio input-radio">
                        <span class="input-radio__body">
                            <input class="input-radio__input"  id="switchs" name="checkout_payment_method" type="radio" checked="checked"> 
                            <span class="input-radio__circle"></span> 
                        </span>
                    </span>
                    <span class="payment-methods__item-title">Pay on Delivery</span>
                </label>
            </li>

            <li class="payment-methods__item">
                <label class="payment-methods__item-header">
                    <span class="payment-methods__item-radio input-radio">
                        <span class="input-radio__body">
                            <input class="input-radio__input" id="switch" name="checkout_payment_method" type="radio"> 
                            <span class="input-radio__circle"></span> 
                        </span>
                    </span>
                    <span class="payment-methods__item-title">Online Payment</span> 
                </label>
            </li>
            
            
        </ul>
    </div>
    <div class="checkout__agree form-group">
        <div class="form-check">
            <span class="input-check form-check-input"> 
                <span class="input-check__body">
                    <input class="input-check__input" type="checkbox" checked id="checkout-terms"> 
                    <span class="input-check__box"></span> 
                        <span class="input-check__icon">
                        <svg width="9px" height="7px">
                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                        </svg> 
                    </span>
                </span>
            </span>

            <label class="form-check-label" for="checkout-terms">I have read and agree to the website 
                <a target="_blank" href="terms">terms and conditions</a>
            </label>

        </div>
    </div>
    <div id="changepage">
    <a href="pay-delivery" id="cartAddressBtn" class="btn btn-primary btn-xl btn-block">Complete Order</a>
    </div>
    </div>
    ';

  
    
}


$data = array(
    'page' => $page,
    'topc'=> $topc,
    'topct'=> $topct
    
);

unset($_SESSION['Address']);

echo json_encode($data);