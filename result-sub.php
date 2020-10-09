
<?php

require 'conn.php';

$out = '';
$outl = '';
$sub = '';
$total ='';
$total_price = 0;
$total_item = 0;
$total_qty = 0;
$clearBtn = '';
$card = '';
    
if(!empty($_SESSION["subscribe"])){ $num = 1;
    foreach($_SESSION["subscribe"] as $keys => $value){
    
    $out .= '<tr class="cart-table__row">
            <td class="cart-table__column cart-table__column--image setimage"  style="background:reds; width:50pxx">
            <a href="product-full?product_id='.$value['id'].'&product_name='.$value['name'].'&brand='.$value['brand'].'">
            <img src="_product_images/'.$value["img"].'" alt="">
            </a></td>
            <td class="cart-table__column cart-table__column--product" ><a href="product-full?product_id='.$value['id'].'&product_name='.$value['name'].'&brand='.$value['brand'].'"
                    class="cart-table__product-name">'.$value['name'].'</a>
                <ul class="cart-table__options">
                    <li>Brand: '.$value['brand'].'</li>
                    <li>SKU: '.$value['sku'].'</li>
                    <li>Vendor Code: '.$value['vcode'].'</li>
                </ul>
            </td>

            <td class="cart-table__column cart-table__column--price" data-title="Price">
            &#8358;'.number_format($value["price"]).'</td>

            <td class="cart-table__column cart-table__column--price bg-dangers" style="width:30pxs !important; text-align:left" data-title="Duration"><span class="text-dangers">'.$value['planNum'].' Months</span></td>

            <td class="cart-table__column cart-table__column--price" data-title="Plan">&#8358;'.number_format($value['plan'] * $value['qty']).'/Month</td>

            <td class="cart-table__column cart-table__column--quantity"
                data-title="Quantity">
                <div class="cart-table__quantity input-number">
                <input class="form-control input-number__input" type="number" min="1" id="quantity" value="'.$value['qty'].'">
                    <div class="input-number__add" id="pluss" pid="'.$value['id'].'"></div>
                    <div class="input-number__sub" id="minuss" pid="'.$value['id'].'"></div>
                </div>
            </td>


            <td class="cart-table__column cart-table__column--total " data-title="Total">
            &#8358;'.number_format($value["qty"] * $value["price"]).'</td>
            <td class="cart-table__column cart-table__column--remove">
                <button type="button" class="cart-table__remove btn btn-sm btn-icon btn-muted deletes" id="'.$value['id'].'">
                    <svg width="12" height="12">
                        <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z" />
                    </svg>
                </button></td>
        </tr>
      
        
        ';

        //sub cart
    $sub .=' <li class="dropcart__item">
            <div class="dropcart__item-image" style="background:reds; width:50px">
            <a href="product-full?product_id='.$value['id'].'&product_name='.$value['name'].'&brand='.$value['brand'].'">
            <img style="max-width:100%" src="_product_images/'.$value["img"].'" alt=""></a></div>
            <div class="dropcart__item-info">
                <div class="dropcart__item-name">
                <a href="product-full?product_id='.$value['id'].'&product_name='.$value['name'].'&brand='.$value['brand'].'">'.$value['name'].'</a></div>
                    <ul class="dropcart__item-features">
                        <li>SKU: '.$value['sku'].'</li>
                        <li>Vendor Code: '.$value['vcode'].'</li>
                    </ul>
                <div class="dropcart__item-meta">
                    <div class="dropcart__item-quantity">'.$value['qty'].'</div>
                    <div class="dropcart__item-price">&#8358;'.number_format($value["price"]).'</div>
                </div>
            </div>
            <button type="button" class="dropcart__item-remove deletes"  id="'.$value['id'].'"><svg width="10"
                    height="10">
                    <path d="M8.8,8.8L8.8,8.8c-0.4,0.4-1,0.4-1.4,0L5,6.4L2.6,8.8c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L3.6,5L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L5,3.6l2.4-2.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L6.4,5l2.4,2.4 C9.2,7.8,9.2,8.4,8.8,8.8z" /></svg></button>
        </li>
        <li class="dropcart__divider" role="presentation"></li>';

        $total_qty += $value["qty"];
        $total_price = $total_price + ($value["qty"] * $value["price"]);
        $total_item = $total_item + 1;
        
    }
    // $_SESSION['total'] = $total_price;

    
        $_SESSION['total'] = $total_price;
    

    $total .='&#8358;'.number_format($total_price,2);

    $outl .='<a href="subscribe" class="btn btn-secondary">View Subscription </a>
    <a href="checkout-sub" class="btn btn-primary">Checkout</a>';
    $clearBtn .='
    <a href="shop-list" class="btn btn-sm btn-info">Continue Shopping <a>
    <a class="btn btn-sm btn-primary" href="#"  id="clearBtnss">Clear Subscription</a>
    ';

    $card .= '
    <div class="card">
        <div class="card-body card-body--padding--2">
            <h3 class="card-title">Subscription Totals</h3>
            <table class="cart__totals-table"> 
                <tbody>
                    <tr style="font-size:20px">
                        <th>Grand Total</th>
                        <td id="grand">&#8358;'.number_format($total_price,2).'</td>
                    </tr>
                </tbody>
            </table>

            <a class="btn btn-primary btn-xl btn-block" href="checkout-sub">Checkout Subscription</a>
            </form>
        </div>
    </div>
    ';




}  else{

    $out .='
        <tr class="cart-table__row">
            <td class="cart-table__column cart-table__column--image " colspan="7">
            <div class="dropcart__item-info text-danger" style="color:red; font-size:24px">
            You don\'t have any subscription
                            
            </div>
            </td>
        </tr>
    
    ';



    $sub .='
    
    <li class="dropcart__item text-centerx">        
        <div class="dropcart__item-info text-danger"  style="text-align:center; background:cyanb; width:100%">
        Subscription plan is empty
                       
        </div>
        
    </li>
    
    ';

    $total .='&#8358;'.number_format($total_price,2);
    

}  



$data = array(
    'sub_details' => $out,
    'subs'=> $sub,
    'total_prices' => '&#8358;' . number_format($total_price, 2),
    'cart-results'=> 'Item added successully to your cart',
    'total_items' =>	$total_qty,
    'totals'=>$total,
    'outls'=>$outl,
    'clearBtns'=>$clearBtn,
    'cards'=>$card
    
);	

echo json_encode($data);
?>
