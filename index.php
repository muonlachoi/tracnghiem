<?php
  include "Model/connect.php";
  include "Model/sinhvien.php";
  include "Model/giaovien.php";
  include "Model/dethi.php";
  include "Model/cauhoi.php";
  include "Model/ketqua.php";
  include "Model/class.phpmailer.php";
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
<link rel="stylesheet" href="Assets/css/style.css">
<link rel="stylesheet" href="Assets/css/styles2.css">
<script src="View/ckeditor5/ckeditor.js"></script>
<title>Trắc Nghiệm</title>
<style>
  .ck-editor__editable_inline{
    min-height: 200px;
    min-width:600px;
}
</style>
</head>
<body>
    <!-- header -->
    <?php 
      include "View/headers.php";
    ?>
    <!-- body -->
    <div class="content">
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
    <!-- footer -->
    <div>
    <?php 
      include("View/footer.php");
    ?>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>