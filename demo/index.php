<?php

$page = "./simple.php";
if (isset($_GET["path"])){
    $page = $_GET["path"];
    if ($page == "" || $page == "simple"){
        $page = "./simple.php";
    } else {
        $page = "./complex.php";
    }
}

$page = file_get_contents($page);
echo($page);

?>