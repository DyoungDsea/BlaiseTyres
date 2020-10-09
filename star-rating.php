<?php

function starRating ($product){
    GLOBAL $conn;
    $sql = $conn->query("SELECT SUM(dstar) as total FROM drating WHERE dpid='$product' AND dstatus='active'");
    if($sql->num_rows>0){
        $row = $sql->fetch_assoc();
        $total = (Float)$row['total'];
        $total_review= (Float)$sql->num_rows;
        $final = floor($total/$total_review);
        //check to know the number
        if($final < 1){
            $star = '
            <div class="rating__star rating__star"></div>
            <div class="rating__star rating__star"></div>
            <div class="rating__star rating__star"></div>
            <div class="rating__star rating__star"></div>
            <div class="rating__star rating__star"></div>
            ';
        }elseif($final == 1){
            $star = '
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star"></div>
            <div class="rating__star rating__star"></div>
            <div class="rating__star rating__star"></div>
            <div class="rating__star rating__star"></div>
            '; 
        }elseif($final == 2){
            $star = '
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star"></div>
            <div class="rating__star rating__star"></div>
            <div class="rating__star rating__star"></div>
            '; 
        }elseif($final == 3){
            $star = '
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star"></div>
            <div class="rating__star rating__star"></div>
            '; 
        }elseif($final == 4){
            $star = '
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star"></div>
            '; 
        }elseif($final == 5){
            $star = '
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star--active"></div>
            <div class="rating__star rating__star--active"></div>
            '; 
        }

    }else{
        $star = '
        <div class="rating__star rating__star"></div>
        <div class="rating__star rating__star"></div>
        <div class="rating__star rating__star"></div>
        <div class="rating__star rating__star"></div>
        <div class="rating__star rating__star"></div>
        ';
    }

    return $star;
}


function starReview($product){
    GLOBAL $conn;
    $sqls = $conn->query("SELECT SUM(dstar) as total FROM drating WHERE dpid='$product' AND dstatus='active'");
    if($sqls->num_rows>0){
        $row = $sqls->fetch_assoc();
        $total = (Float)$row['total'];
        $total_review= (Float)$sqls->num_rows;
        $final = floor($total/$total_review);

        if($total_review==1){
            $review ="$final on $total_review review";

        }else{
            $review ="$final on $total_review reviews";
        }
       
    }else{
        $review ="";
    }

    return $review;
}


?>