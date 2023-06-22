<?php 
  $company_profile = $this->M_user->view_where('frs_general_company_profile', array('account'=>$this->session->userdata('level_id')))->row_array(); 
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h5><?php echo $company_profile['name']; ?> <small class="small-text"> Management System</small></h5>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"><i class="fas fa-user-check"></i> List Supplier</li>
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
            <h3 class="card-title">List Supplier</h3>
            <div class="float-sm-right">
              <a class="btn btn-success btn-xs" href="<?= site_url('purchasing/add_suppliers') ?>" title="Add new"><i class="fa fa-plus"></i> <span class="hidden-xs hidden-sm">Add New</span></a>
            </div>
          </div>
          <div class="card-body table-responsive">
            <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>No.</th>
                  <th>Account</th>
                  <th>Name</th>
                  <th>City</th>
                  <th>Email Address</th>
                  <th>Contact Person</th>
                  <th>Limit Credit</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($suppliers as $sup): ?>
                <tr>
                  <td>
                      <a href="<?= site_url('purchasing/edit_suppliers/'.$sup->account) ?>" title='Edit' class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                      <a href="<?= site_url('purchasing/delete_suppliers/'.$sup->account) ?>" title='Delete' class="btn btn-sm btn-danger del"><i class="fa fa-trash-alt"></i></a>
                  </td>
                  <td><?= isset($no) ? ++$no : $no=1 ?> </td>
                  <td><?= $sup->account ?></td>
                  <td><?= $sup->name ?></td>
                  <td><?= $sup->city ?></td>
                  <td><?= $sup->email_address ?></td>
                  <td><?= $sup->contact_person ?></td>
                  <td><?= $sup->limit_credit ?></td>
                </tr>
              <?php endforeach; ?>
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