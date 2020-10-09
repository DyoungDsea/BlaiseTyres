<?php
function remove_tags($value){
    $value=htmlspecialchars_decode($value);
    $value=html_entity_decode($value);
    $value=strip_tags($value);
    $value=htmlspecialchars($value);
    return $value;
    }


    ?>