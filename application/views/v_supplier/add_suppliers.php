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
          <li class="breadcrumb-item "><a href="<?= base_url('helpdesk/users'); ?>"><i class="fas fa-user-check"></i> List Supplier</a></li>
          <li class="breadcrumb-item active"> Add Supplier</li>
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
            <h3 class="card-title">Add Supplier</h3>
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
            <form class="row" action="<?php echo site_url('purchasing/add_suppliers') ?>" method="post" enctype="multipart/form-data">

              <!-- Kolom Kiri -->
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account">Account</label>
                  <input class="form-control <?php echo form_error('account') ? 'is-invalid':'' ?>" type="text" id="account" name="account" placeholder="Create Automatically" disabled required/>
                  <div class="invalid-feedback">
                    <?php echo form_error('account') ?>
                  </div>
                </div>

                <div class="form-group">
                    <label for="name">Name*</label>
                    <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>" type="text" name="name" placeholder="Name" required/>
                    <div class="invalid-feedback">
                      <?php echo form_error('name') ?>
                    </div>
                </div>

                <div class="form-group">
                  <label for="npwp_no">Npwp Number</label>
                  <input class="form-control <?php echo form_error('npwp_no') ? 'is-invalid':'' ?>" type="text" name="npwp_no" placeholder="Npwp Number"/>
                  <div class="invalid-feedback">
                    <?php echo form_error('npwp_no') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea class="form-control" type="text" name="address" placeholder="Address"/></textarea>
                  <div class="invalid-feedback">
                    <?php echo form_error('address') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="city">City</label>
                  <input class="form-control <?php echo form_error('city') ? 'is-invalid':'' ?>" type="text" name="city" placeholder="City"/>
                  <div class="invalid-feedback">
                    <?php echo form_error('city') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="contact_person">Contact Person</label>
                  <input class="form-control <?php echo form_error('contact_person') ? 'is-invalid':'' ?>" type="text" name="contact_person" placeholder="Contact Person"/>
                  <div class="invalid-feedback">
                    <?php echo form_error('contact_person') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email_address">Email</label>
                  <input class="form-control <?php echo form_error('email_address') ? 'is-invalid':'' ?>" type="email" name="email_address" placeholder="Email"/>
                  <div class="invalid-feedback">
                    <?php echo form_error('email_address') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tlp_no">Phone Number</label>
                  <input class="form-control <?php echo form_error('tlp_no') ? 'is-invalid':'' ?>" type="text" name="tlp_no" placeholder="Phone Number"/>
                  <div class="invalid-feedback">
                    <?php echo form_error('tlp_no') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="hp_no">Handphone Number</label>
                  <input class="form-control <?php echo form_error('hp_no') ? 'is-invalid':'' ?>" type="text" name="hp_no" placeholder="Contact Person"/>
                  <div class="invalid-feedback">
                    <?php echo form_error('hp_no') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="fax_no">Fax Number</label>
                  <input class="form-control <?php echo form_error('fax_no') ? 'is-invalid':'' ?>" type="text" name="fax_no" placeholder="Fax Number"/>
                  <div class="invalid-feedback">
                    <?php echo form_error('fax_no') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="currency">Currency</label>
                  <input class="form-control <?php echo form_error('currency') ? 'is-invalid':'' ?>" type="text" name="currency" placeholder="Currency"/>
                  <div class="invalid-feedback">
                    <?php echo form_error('currency') ?>
                  </div>
                </div>
              </div>

              <!-- Kolom Kanan -->
              <div class="col-sm-6">
                
                <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="tax_ppn">Tax PPN</label>
                    <select class="form-control" id="tax_ppn" name="tax_ppn">
                      <option value="" selected disabled>-- Choose Tax PPN --</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    <small class="text-danger">
                      <?php echo form_error('tax_ppn') ?>
                    </small>
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="tax_pph23">Tax PPh23</label>
                    <select class="form-control" id="tax_pph23" name="tax_pph23">
                      <option value="" selected disabled>-- Choose Tax PPh23 --</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    <small class="text-danger">
                      <?php echo form_error('tax_pph23') ?>
                    </small>
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="payment_method">Payment Method</label>
                    <select class="form-control" id="payment_method" name="payment_method">
                      <option value="" selected disabled>-- Choose Payment Method --</option>
                      <option value="CBD">CBD</option>
                      <option value="COD">COD</option>
                      <option value="TOP">TOP</option>
                    </select>
                    <small class="text-danger">
                      <?php echo form_error('payment_method') ?>
                    </small>
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="payment_top">Payment Top*</label>
                    <input class="form-control <?php echo form_error('payment_top') ? 'is-invalid':'' ?>"
                     type="text" name="payment_top" placeholder="Payment Top"/>
                    <div class="invalid-feedback">
                      <?php echo form_error('payment_top') ?>
                    </div>
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="payment_top_start">Start TOP</label>
                    <select class="form-control" id="payment_top_start" name="payment_top_start">
                      <option value="" selected disabled>-- Choose Start TOP --</option>
                      <option value="INVOICE RECEIPT">INVOICE RECEIPT</option>
                      <option value="GOODS RECEIPT">GOODS RECEIPT</option>
                    </select>
                    <small class="text-danger">
                      <?php echo form_error('payment_top_start') ?>
                    </small>
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="limit_credit">Limit Credit</label>
                    <input class="form-control <?php echo form_error('limit_credit') ? 'is-invalid':'' ?>"
                     type="text" name="limit_credit" placeholder="Limit Credit"/>
                    <div class="invalid-feedback">
                      <?php echo form_error('limit_credit') ?>
                    </div>
                  </div>
                </div>

                <div class="">
                  <label for="account_bank">Account Bank</label>
                  <input class="form-control <?php echo form_error('account_bank') ? 'is-invalid':'' ?>"
                   type="text" name="account_bank" placeholder="Account Bank"/>
                  <div class="invalid-feedback">
                    <?php echo form_error('account_bank') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="name_bank">Name Bank</label>
                  <input class="form-control <?php echo form_error('name_bank') ? 'is-invalid':'' ?>"
                   type="text" name="name_bank" placeholder="Name Bank"/>
                  <div class="invalid-feedback">
                    <?php echo form_error('name_bank') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="summary">Note</label>
                  <textarea class="form-control" type="text" name="summary" placeholder="Note"/></textarea>
                  <div class="invalid-feedback">
                    <?php echo form_error('summary') ?>
                  </div>
                </div>
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