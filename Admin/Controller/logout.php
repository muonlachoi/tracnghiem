<?php
$action = 'logout';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case "logout":
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=home&act=home"/>';
            break;
        }else{
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=home&act=home"/>';
            break;
        }
}
?>