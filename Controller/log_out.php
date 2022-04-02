<?php
$action = 'logout';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case "logout":
        if (isset($_SESSION['maHS']) && isset($_SESSION['tenHS']) && isset($_SESSION['email']) && isset($_SESSION['diachi']) && isset($_SESSION['tenLop'])) {
            unset($_SESSION['maHS']);
            unset($_SESSION['tenHS']);
            unset($_SESSION['email']);
            unset($_SESSION['diachi']);
            unset($_SESSION['tenLop']);
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=login_sv&act=login_sv"/>';
            break;
        }
        elseif (isset($_SESSION['maGV']) && isset($_SESSION['tenGV'])) {
            unset($_SESSION['maGV']);
            unset($_SESSION['tenGV']);
            unset($_SESSION['role']);
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=login_gv&act=login_gv"/>';
            break;
        }
        else{
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=home&act=home"/>';
            break;
        }
        
}
?>