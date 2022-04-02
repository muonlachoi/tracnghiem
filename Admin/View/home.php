<?php 
    if(!isset($_SESSION['admin']))
    {
        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=login"/>';
    }
?>
<div class="col-lg-2">
    <?php
        include "View/sidebar.php";
    ?>
</div>
<div class="col-lg-10">
    <section>
    <div>
    <h2 class="text-center text-danger mt-5">Ai ya ya chào mừng huynh đệ đã ghé thăm tệ xá đó mà</h2>
    </div>
    
    <div class="text-center">
        <img src="Assets/img/cats.gif" alt="">
    </div>
    </section>
</div>
