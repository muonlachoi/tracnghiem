<?php 
    $action="sinhvien";
    if(isset($_GET['act']))
    {
        $action=$_GET['act'];
    }
    switch($action)
    {
        case "sinhvien":
            include 'View/sinhvien.php';
            break;
    }
?>