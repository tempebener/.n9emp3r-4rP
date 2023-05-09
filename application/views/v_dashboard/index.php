<!DOCTYPE html>
<html>

  <?php $this->load->view('layouts_admin/head'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  
  <?php 
    //Navbar
    $this->load->view('layouts_admin/navbar');

    //Sidebar
    $this->load->view('layouts_admin/sidebar'); 
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4><?php echo $company_profile['name']; ?> <small class="small-text"> Management System</small></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <li class="breadcrumb-item active"><i class="fa fa-home"></i> Home</li>
            </ol>
          </div><!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-12">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Administrator</h3>

                <p>Aplikasi Simulasi CAT (Computer Assisted Test) SKD (Seleksi Kompetensi Dasar) CPNS (Calon Pegawai Negeri Sipil)</p>
              </div>
              <div class="icon">
                <i class="fas fa-cogs"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
  //Footer
  $this->load->view('layouts_admin/footer');
  ?>
</div>
<!-- ./wrapper -->

<?php 
  //Script
  $this->load->view('layouts_admin/script'); 
?>

</body>
</html>
