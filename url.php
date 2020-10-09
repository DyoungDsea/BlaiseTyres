<?php

$page = $_POST['page'];
$url = $_POST['url'].'page='.$page;
// echo $url;
header("Location:$url");