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
            <h5><?php echo $company_profile['name']; ?> <small class="small-text"> Management System</small></h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><i class="fas fa-user-check"></i> Users</li>
            </ol>
          </div><!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
                <div class="float-sm-right">
                  <a class="btn btn-success btn-xs" href="frsHelpdeskUsers.php?act=add" title="Add new"><i class="fa fa-plus"></i> <span class="hidden-xs hidden-sm">Add New</span></a>
                </div>
              </div>
              <div class="card-body table-responsive">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>No</th>
                      <th>Username</th>
                      <th>Name</th>
                      <th>Level</th>
                      <th>Blocked</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($data as $u){ ?>
                    <tr>
                      <td>
                          <a href="<?= site_url('helpdesk/edit/'.$u['id_users']) ?>" title='Edit' class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                          <a href="<?= site_url('helpdesk/delete/'.$u['id_users']) ?>" title='Delete' class="btn btn-sm btn-danger del"><i class="fa fa-trash-alt"></i></a>
                      </td>
                      <td><?= isset($no) ? ++$no : $no=1 ?> </td>
                      <td><?= $u['id_users'] ?></td>
                      <td><?= $u['name'] ?></td>
                      <td>
                        <?php
                            if($u['level_id']=="1"){
                                echo "ADMINISTRATOR";
                            }elseif($u['level_id']=="2"){
                                echo "USER";
                            }
                        ?>
                      </td>
                      <td>
                        <?php
                            if($u['blocked']=="No"){
                                echo "No";
                            }elseif($u['blocked']=="Yes"){
                                echo "Yes";
                            }
                        ?>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

    <!-- Modal Edit User -->
    <?php include 'edit.php';  ?>
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
