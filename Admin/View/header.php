<div id="wrapper">
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <a class="navbar-brand" href="index.php?action=home&act=home"> <i class="fas fa-school"></i> Trắc Ngiệm Online</a>
                <!-- Sidebar Toggle - Topbar -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - Logout -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <?php 
                        if(isset($_SESSION['admin']))
                        {
                            echo '<a class="link-dark" href="index.php?action=logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark"></i>
                                    Logout
                                 </a>';
                        }
                        ?>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>