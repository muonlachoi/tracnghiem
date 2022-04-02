    
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?action=home&act=home">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><?php echo ($_SESSION['admin']); ?></div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider">
        
        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>
        <!-- quản lý Lớp -->
        <li class="nav-item ">
            <div class="btn-group dropend">
                <button type="button" class="btn  dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">
                    Quản lý lớp
                </button>
                <ul class="dropdown-menu text-center ">
                    <li>
                        <a class="text-decoration-none" href="index.php?action=lop&act=themlop" >
                                <span>Thêm lớp</span>
                            </a>
                    </li>
                    <li>
                        <a class="text-decoration-none" href="index.php?action=lop&act=lop" >
                            <span>Quản lý lớp</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li> 
        <!-- Quản lý Môn -->
        <li class="nav-item">
            <div class="btn-group dropend">
                <button type="button" class="btn  dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">
                    Quản lý môn học
                </button>
                <ul class="dropdown-menu text-center">
                    <li>
                        <a class="text-decoration-none" href="index.php?action=mon&act=themmon" >
                                <span>Thêm môn</span>
                            </a>
                    </li>
                    <li>  <a class="text-decoration-none" href="index.php?action=mon&act=mon" >
                                <span>Quản lý môn</span>
                            </a></li>
                </ul>
            </div>
        </li>
        <!-- qUẢN LÝ GIÁO VIÊN -->
        <li class="nav-item">
            <div class="btn-group dropend">
                <button type="button" class="btn  dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">
                    Quản lý giáo viên
                </button>
                <ul class="dropdown-menu text-center">
                    <li>
                        <a class="text-decoration-none" href="index.php?action=giaovien&act=giaovien" >
                                <span>Danh sách giáo viên</span>
                            </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- quản lý năm học -->
        <li class="nav-item">
            <div class="btn-group dropend">
                <button type="button" class="btn  dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">
                Quản lý năm học
                </button>
                <ul class="dropdown-menu text-center ">
                    <li>
                        <a class="text-decoration-none" href="index.php?action=phancong&act=themnam" >
                            <span>Thêm năm học</span>
                        </a>
                    </li>

                    <li>
                        <a class="text-decoration-none" href="index.php?action=phancong&act=themhocky" >
                            <span>Thêm học kỳ</span>
                        </a>
                    </li>
                
                    </li>
                        <?php
                            // $sv= new phancong();
                            // $res=$sv->namhoc(); 
                            // // $namhoc=$res['id_namhoc'];
                            // while($set = $res->fetch()):
                        ?>
                    <li>
                        <a class="text-decoration-none"  name="id_namhoc" href="index.php?action=phancong&act=namhoc">Phân công</a>
                    </li>
                    <!-- <?php //endwhile; ?> -->
                </ul>
            </div>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider">
        
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>
        
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        
    </ul>
