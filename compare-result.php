
<?php

require 'conn.php';
require 'star-rating.php';

$out = '';

if(!empty($_SESSION["compare"])){ $num = 1;
    foreach($_SESSION["compare"] as $keys => $come){
    
    $out .= '
    <input type="hidden" id="pname'.$come['id'].'" value="'.$come['name'].'">
    <input type="hidden" id="brand'.$come['id'].'" value="'.$come['brand'].'"> 
    <input type="hidden" id="sku'.$come['id'].'" value="'.$come['sku'].'">
    <input type="hidden" id="vcode'.$come['id'].'" value="'.$come['vcode'].'">
    <input type="hidden" id="img'.$come['id'].'" value="'.$come['img'].'">
    <input type="hidden" id="quantity'.$come['id'].'" value="1">
    <input id="fullPayment'.$come['id'].'" value="'.$come['price'].'" type="hidden">
    <tr class="wishlist__row wishlist__row--body">
        <td class="wishlist__column wishlist__column--body wishlist__column--image setimage">
        <a href="product-full?product_id='.$come['id'].'&product_name='.$come['name'].'&brand='.$come['brand'].'">
            <img src="_product_images/'.$come["img"].'" alt="">
            </a>
            </td>
        <td class="wishlist__column wishlist__column--body wishlist__column--product">
            <div class="wishlist__product-name"><a href="product-full?product_id='.$come['id'].'&product_name='.$come['name'].'&brand='.$come['brand'].'">'.$come['name'].'</a></div>
            <div class="wishlist__product-rating">
                <div class="wishlist__product-rating-stars">
                    <div class="rating">
                        <div class="rating__body">
                            '.starRating($come['id']).'
                        </div>
                    </div>
                </div>
                <div class="wishlist__product-rating-title">'.starReview($come['id']).'</div>
            </div>
        </td>
        <td class="wishlist__column wishlist__column--body wishlist__column--stock">
            <div class="status-badge status-badge--style--success status-badge--has-text">
                <div class="status-badge__body">
                    <div class="status-badge__text">'.$come['avaliable'].'</div>
                </div>
            </div>
        </td>
        <td class="wishlist__column wishlist__column--body wishlist__column--price">&#8358;'. number_format( $come['price']).'
        </td>

        <td class="wishlist__column wishlist__column--body wishlist__column--price">'.$come['sku'].'
        </td>

        <td class="wishlist__column wishlist__column--body wishlist__column--button">
            <button pid="'.$come['id'].'" type="button" id="addToCarts" class="btn btn-sm btn-primary">Add to cart</button></td>
        <td class="wishlist__column wishlist__column--body wishlist__column--remove">
        <button pid="'.$come['id'].'" id="pots" type="button" class="wishlist__remove btn btn-sm btn-muted btn-icon"><svg
                    width="12" height="12">
                    <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z" /></svg></button></td>
    </tr>
    
    ';

        
    
    }


}  else{

    $out .='
        <tr class="cart-table__row">
            <td class="cart-table__column cart-table__column--image " colspan="10">
            <div class="dropcart__item-info text-danger" style="color:red; font-size:24px">
            No result found
                             
            </div>
            </td>
        </tr>
    
    ';


    

}  



echo json_encode($out);
?>
