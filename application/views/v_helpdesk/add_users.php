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
              <li class="breadcrumb-item "><i class="fas fa-user-check"></i> <a href="<?= base_url('helpdesk/users'); ?>">Users</a></li>
              <li class="breadcrumb-item active"> Add Users</li>
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
                <h3 class="card-title">Add Users</h3>
                <div class="float-sm-right">
                  <!-- <a class="btn btn-success btn-xs" href="frsHelpdeskUsers.php?act=add" title="Add new"><i class="fa fa-plus"></i> <span class="hidden-xs hidden-sm">Add New</span></a> -->
                </div>
              </div>

              <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success alert-dismissible fade show alert-custom">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $this->session->flashdata('success'); ?>
              </div>
              <?php endif; ?>

              <div class="card-body table-responsive">
                <form class="row" action="<?php echo site_url('helpdesk/add_users') ?>" method="post" enctype="multipart/form-data">
            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
              oleh controller tempat vuew ini digunakan. Yakni index.php/admin/userss/edit/ID --->

                  <input type="hidden" name="id" value="<?php echo $users->id?>" />

                  <div class="form-group col-sm-6">
                    <label for="username">Username</label>
                    <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" placeholder="username" value="<?php echo $users->id ?>" disabled/>
                    <div class="invalid-feedback">
                      <?php echo form_error('username') ?>
                    </div>
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="Level">Level*</label>
                      <select class="form-control" id="level_id" name="level_id">
                        <option value="" selected disabled>-- Choose Level User --</option>
                        <option value="1" <?php if ($users->level_id == "1") : echo "selected";
                                                endif; ?>>Administrator</option>
                        <option value="2" <?php if ($users->level_id == "2") : echo "selected";
                                                    endif; ?>>Users</option>
                      </select>
                      <small class="text-danger">
                        <?php echo form_error('level_id') ?>
                      </small>
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="name">Name*</label>
                    <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
                     type="text" name="name" placeholder="users name" value="<?php echo $users->name ?>" />
                    <div class="invalid-feedback">
                      <?php echo form_error('name') ?>
                    </div>
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="access_app">Access Apps*</label>
                      <select class="form-control" id="access_app" name="access_app">
                        <option value="" selected disabled>-- Choose Access Apps --</option>
                        <option value="1" <?php if ($users->access_app == "1") : echo "selected";
                                                endif; ?>>Grant</option>
                        <option value="2" <?php if ($users->access_app == "2") : echo "selected";
                                                    endif; ?>>Revoke</option>
                      </select>
                      <small class="text-danger">
                        <?php echo form_error('access_app') ?>
                      </small>
                  </div>

                  <div class="form-group col-sm-6">
                    <input class="btn btn-success" type="submit" name="btn" value="Submit" />
                  </div>
                </form>

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
  </div>
  <!-- /.content-wrapper -->