
<?php

require 'conn.php';

$out = '';
$outl = '';
$sub = '';
$total ='';
$totalx ='';
$total_price = 0;
$total_item = 0;
$total_qty = 0;
$clearBtnc = '';
$card = '';
$check = '';

if(!empty($_SESSION["budget"])){ $num = 1;
    foreach($_SESSION["budget"] as $keys => $values){
    
    $out .= '<tr class="cart-table__row">
            <td class="cart-table__column cart-table__column--image setimage"  style="background:reds; width:50pxx">
            <a href="product-full?product_id='.$values['id'].'&product_name='.$values['name'].'&brand='.$values['brand'].'">
            <img src="_product_images/'.$values["img"].'" alt="">
            </a></td>
            <td class="cart-table__column cart-table__column--product"><a href="product-full?product_id='.$values['id'].'&product_name='.$values['name'].'&brand='.$values['brand'].'"
                    class="cart-table__product-name">'.$values['name'].'</a>
                <ul class="cart-table__options">
                    <li>Brand: '.$values['brand'].'</li>
                    <li>SKU: '.$values['sku'].'</li>
                    <li>Vendor Code: '.$values['vcode'].'</li>
                </ul>
            </td>
            <td class="cart-table__column cart-table__column--price" data-title="Price">
            &#8358;'.number_format($values["price"]).'</td>
            <td class="cart-table__column cart-table__column--quantity"
                data-title="Quantity">
                <div class="cart-table__quantity input-number">
                <input class="form-control input-number__input" type="number" min="1" id="quantity" value="'.$values['qty'].'">
                    <div class="input-number__add" id="plus" pid="'.$values['id'].'"></div>
                    <div class="input-number__sub" id="minus" pid="'.$values['id'].'"></div>
                </div>
            </td>
            <td class="cart-table__column cart-table__column--total" data-title="Total">
            &#8358;'.number_format($values["qty"] * $values["price"]).'</td>
            <td class="cart-table__column cart-table__column--remove">
                <button type="button" class="cart-table__remove btn btn-sm btn-icon btn-muted delete" id="'.$values['id'].'">
                    <svg width="12" height="12">
                        <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z" />
                    </svg>
                </button></td>
        </tr>';

        //sub cart
    $sub .=' <li class="dropcart__item">
            <div class="dropcart__item-image" style="background:reds; width:50px">
            <a href="product-full?product_id='.$values['id'].'&product_name='.$values['name'].'&brand='.$values['brand'].'">
            <img style="max-width:100%" src="_product_images/'.$values["img"].'" alt=""></a></div>
            <div class="dropcart__item-info">
                <div class="dropcart__item-name">
                <a href="product-full?product_id='.$values['id'].'&product_name='.$values['name'].'&brand='.$values['brand'].'">'.$values['name'].'</a></div>
                    <ul class="dropcart__item-features">
                        <li>SKU: '.$values['sku'].'</li>
                        <li>Vendor Code: '.$values['vcode'].'</li>
                    </ul>
                <div class="dropcart__item-meta">
                    <div class="dropcart__item-quantity">'.$values['qty'].'</div>
                    <div class="dropcart__item-price">&#8358;'.number_format($values["price"]).'</div>
                </div>
            </div>
            <button type="button" class="dropcart__item-remove delete"  id="'.$values['id'].'"><svg width="10"
                    height="10">
                    <path d="M8.8,8.8L8.8,8.8c-0.4,0.4-1,0.4-1.4,0L5,6.4L2.6,8.8c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L3.6,5L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L5,3.6l2.4-2.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L6.4,5l2.4,2.4 C9.2,7.8,9.2,8.4,8.8,8.8z" /></svg></button>
        </li>
        <li class="dropcart__divider" role="presentation"></li>';

       

        $total_qty += $values["qty"];
        $total_price = $total_price + ($values["qty"] * $values["price"]);
        $total_item = $total_item + 1;
       

        // if(isset($_SESSION['coupon'])){
        //     $_SESSION['cart-total'] = $_SESSION['coupon'];
        // }else{
        //     $_SESSION['cart-total'] = $total_price;
        // }

        $_SESSION['cart-total'] = $total_price;
        $_SESSION['cart-qty'] = $total_qty;
    
    }

    if(isset($_SESSION['coupon'])){
        $totalx .= $_SESSION['coupon'];
    }else{
        $totalx .=$total_price;
    }

    $total .='&#8358;'.number_format($total_price,2);

    $outl .='<a href="cart" class="btn btn-secondary">View Cart</a> 
    <a href="checkout" class="btn btn-primary">Checkout</a>';
    $clearBtnc .='
    <a href="shop-list" class="btn btn-sm btn-info">Continue Shopping <a>
    <a class="btn btn-sm btn-primary" href="#"  id="clearBtncp">Clear Cart</a>';

    $card .= '
    <div class="card">
        <div class="card-body card-body--padding--2">
            <h3 class="card-title">Shopping Cart Total</h3>
            <form action="sub-process" method="POST">
            <table class="cart__totals-table">
                
                <tbody>
                    <tr  style="font-size:20px">
                        <th>Grand Total</th>
                        <td id="coupons">&#8358;'.number_format($total_price,2).'</td>
                    </tr>
                </tbody>
                
            </table>
            <hr style="margin-top:-20px;">
            <a class="btn btn-primary btn-xl btn-block" href="checkout">Proceed to Checkout</a>
            </form>
        </div>
    </div>
    ';




}  else{

    $out .='
        <tr class="cart-table__row">
            <td class="cart-table__column cart-table__column--image " colspan="5">
            <div class="dropcart__item-info text-danger" style="color:red; font-size:24px">
            Cart is empty
                <svg width="52" height="52" >
                    <circle cx="10.5" cy="27.5" r="2.5" />
                    <circle cx="23.5" cy="27.5" r="2.5" />
                    <path d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3 l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14 c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z" />
                </svg>             
            </div>
            </td>
        </tr>
    
    ';



    $sub .='
    
    <li class="dropcart__item text-centerx">        
        <div class="dropcart__item-info text-danger"  style="text-align:center; background:cyanb; width:100%">
        Cart is empty
            <svg width="52" height="52">
                <circle cx="10.5" cy="27.5" r="2.5" />
                <circle cx="23.5" cy="27.5" r="2.5" />
                <path d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3 l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14 c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z" />
            </svg>             
        </div>
        
    </li>
    
    ';

    $total .='&#8358;'.number_format($total_price,2);
    

}  



$data = array(
    'cart_details' => $out,
    'sub'=> $sub,
    'total_price' => '&#8358;' . number_format($total_price, 2),
    'cart-result'=> 'Item added successully to your cart',
    'total_item' =>	$total_qty,
    'total'=>$total,
    'outl'=>$outl,
    'clearBtnc'=>$clearBtnc,
    'card'=>$card,
    'check'=>$check
    
);	

echo json_encode($data);
?>


