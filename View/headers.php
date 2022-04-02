
    <section>
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php?action=home"><i class="fas fa-school"></i> Trắc Ngiệm Online</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1">
                          <?php 
                            if(isset($_SESSION['maHS']))
                            {
                              echo '<a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php?action=sinhvien"><i class="fas fa-user-graduate "></i> Sinh viên</a>';
                            }
                          ?>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                          <?php 
                            if(isset($_SESSION['maGV']))
                            {
                              echo '<a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php?action=giaovien"><i class="fas fa-chalkboard-teacher"></i> Giáo viên</a>';
                            }
                          ?>
                          
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                          <?php 
                          if(!isset($_SESSION['maGV'])&& !isset($_SESSION['maHS']))
                          {
                            echo '<a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php?action=login_gv&act=login_gv"><i class="fas fa-chalkboard-teacher"></i> Giáo Viên</a>';
                            
                          }
                          ?>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                          <?php 
                          if(!isset($_SESSION['maGV'])&& !isset($_SESSION['maHS']))
                          {
                            echo '<a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php?action=login_sv&act=login_sv"><i class="fas fa-user-graduate"></i> Sinh Viên</a>';
                          }
                          ?>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                          <?php 
                            if(isset($_SESSION['maGV'])&& isset($_SESSION['tenGV']))
                            {
                              echo '<a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php?action=log_out"> '. $_SESSION['tenGV'] .' ( <i class="fas fa-sign-out-alt"></i>Logout)</a>';
                            }
                            if(isset($_SESSION['maHS'])&& isset($_SESSION['tenHS']))
                            {
                              echo '<a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php?action=log_out"> '. $_SESSION['tenHS'] .' ( <i class="fas fa-sign-out-alt"></i>Logout)</a>';
                            }
                          ?>
                          
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="bg-dark " >
          <img src="Assets/img/ban2.jpg" height="500px" width="100%" alt="">
        </header>
  </section>
</header>