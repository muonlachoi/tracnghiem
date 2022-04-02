<?php
include "Model/connect.php";
include "Model/quanlylop.php";
include "Model/quanlymon.php";
include "Model/quanlysinhvien.php";
include "Model/quanlygiaovien.php";
include "Model/login.php";
include "Model/phancong.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="Assets/css/all.min.css" type="text/css">
<link rel="stylesheet" href="Assets/css/sb-admin-2.min.css">
<title>Trắc Nghiệm</title>
</head>

<body id="page-top">
    <!-- header -->
    <?php
        if(isset($_SESSION['admin']))
        {
            include "View/header.php";
        }
            
      ?>
      
    <!-- body -->
    <div class="container-fluid">
        <div class="row">
            <?php 
            $ctrl="home";
            if(isset($_GET['action'])){
                $ctrl=$_GET['action'];
            }
            include ('Controller/'.$ctrl.'.php');
            ?>
          </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
    <?php
      if(isset($_SESSION['admin']))
      {
        include("View/footer.php");
      } 
      
    ?>
    </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</html>