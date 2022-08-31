<!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">

      <li class="nav-item">

        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>

      </li>

    </ul>

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto d-none d-md-block d-lg-none d-lg-block d-xl-none d-xl-block">

      <!-- Messages Dropdown Menu -->      

      <li class="nav-item">

        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">

          <i class="fas fa-th-large"></i>

        </a>

      </li>

    </ul>

  </nav>

  <!-- /.navbar -->



  <!-- Main Sidebar Container -->

  <aside class="main-sidebar elevation-4 sidebar-light-navy">

    <!-- Brand Logo -->

    <a href="<?=base_url();?>assets/index3.html" class="brand-link navbar-gray-dark">

      <img src="<?=base_url();?>assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

      <span class="brand-text font-weight-light text-light">BulananKU</span>

    </a>



    <!-- Sidebar -->

    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden"><div class="os-resize-observer-host"><div class="os-resize-observer observed" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer observed"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 73px; height: 318px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll; right: 0px; bottom: 0px;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">

      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="image">

          <img src="<?=base_url();?>assets/dist/img/squidward.png" class="img-circle elevation-2" alt="User Image">

        </div>

        <div class="info">

          <a href="#" class="d-block"><?=$this->session->userdata('nama_user')?></a>

        </div>

      </div>



      <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

          <li class="nav-item">

            <a href="<?=base_url()?>User/index" class="nav-link <?=($nav=='1'?'active':'');?>">

              <i class="nav-icon fas fa-file-invoice-dollar"></i>

              <p>

                Summary

              </p>

            </a>

          </li>

          <li class="nav-item">

            <a href="<?=base_url()?>User/report" class="nav-link <?=($nav=='2'?'active':'');?>">

              <i class="nav-icon fas fa-chart-line"></i>

              <p>

                Report

              </p>

            </a>

          </li>

          <li class="nav-item">

            <a href="<?=base_url()?>Auth/logout" class="nav-link">

              <i class="nav-icon fas fa-arrow-circle-left"></i>

              <p>

                Logout

              </p>

            </a>

          </li>

        </ul>

      </nav>

      <!-- /.sidebar-menu -->

    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 35.2876%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>

    <!-- /.sidebar -->

  </aside>

  <!-- Main Sidebar Container -->