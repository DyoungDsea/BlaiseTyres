<?php
require 'conn.php';
include 'track.php';
$_SESSION['wishlist']=$_GET['pid'];

//check if user have login account
    if (!isset($_SESSION['logged']) && $_SESSION['logged'] !== true) {
        header("location: login");
    }else{
        $pid = $_SESSION['wishlist'];
        $userid = $_SESSION['userid'];
        $id = date("ymdhis");
        //check if product exit already
        $sel = $conn->query("SELECT * FROM  dwishlist WHERE userid='$userid' AND pid='$pid'");
        if($sel->num_rows > 0){
            header("Location:wishlist");
            $_SESSION['msg']='Item already added';
            unset($_SESSION['wishlist']);
        }else{
            //insert into database
            $wish = $conn->query("INSERT INTO dwishlist SET wish_id='$id', userid='$userid', pid='$pid'");
            if($wish){
                header("Location:wishlist");
                $_SESSION['msgs']='Add to wishlist successfully';
                unset($_SESSION['wishlist']);
            }
        }

    }
?>