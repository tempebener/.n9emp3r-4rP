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

<script>
  $(document).ready(function() {

    //DataTable
    $('#example').DataTable({ 
        "processing" : true, //Feature control the processing indicator.
        "serverSide" : true, //Feature control DataTables' server-side processing mode.
        "order"    : [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url" : "<?php echo site_url('datamember/ajaxGetMembers'); ?>",
          "type"  : "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs" : [
          { 
            "targets" : [ 0 ], //first column / numbering column
            "orderable" : false, //set not orderable
          },
        ],
      });


    //Save input data user
    $('#btn-saveUser').on('click', function(){
      const idKategoriSoal = $('#addUser').attr('value');
      const form = $('#formInputUser');
      
      $.ajax({
        url: "<?php echo base_url('datamember/add/')?>" + idKategoriSoal,
        method: "POST",
        data: form.serialize(),
        dataType: "JSON",
        success: function (data) {
          //Data Error
          if(data.error){

            if(data.name_error != '') $('#name_error').html(data.name_error);   
            else $('#name_error').html('');

            if(data.level_id_error != '') $('#level_id_error').html(data.level_id_error);   
            else $('#level_id_error').html('');

            if(data.blocked_error != '') $('#blocked_error').html(data.blocked_error);   
            else $('#blocked_error').html('');
          }

          //Data User Berhasil Disimpan
          if(data.success){
            form.trigger('reset');
            $('#modalAdd').modal('hide');
            //$('.textarea').next().find(".note-editable").text("");
            $('#name_error').html('');
            $('#level_id_error').html('');
            $('#blocked_error').html('');
            $('#example').DataTable().ajax.reload();
            toastr.success('The user data has been successfully saved.');
          }
            
        }
        
      });

    });

    //Hapus data user
    $('body').on('click', '.btn-delete', function (e) {
      e.preventDefault();

      //Alamat Controller Delete User
      const url = $(this).attr('href');

      Swal.fire({
        title: 'Delete Data?',
        text: "Do you want to delete the user data about this?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: url,
            method: "POST",
            success: function (response) {
                $('#example').DataTable().ajax.reload();
                toastr.error('User data has been successfully deleted.');
            }
          });

        }

      });
    });

    //Tampil modal edit data user
    $('body').on('click', '.btn-edit', function (e) {
      e.preventDefault();
      const idUser = $(this).attr('value');

      $.ajax({
        url : "<?php echo base_url('datamember/ajaxUpdate/')?>" + idUser,
        type: "GET",
        dataType: "JSON", 
        success: function(data)
        {
            $('[name="idUser"]').val(data.id);
            $('[name="name"]').val(data.name);
            $('[name="level_id"]').val(data.level_id);
            $('[name="blocked"]').val(data.blocked);
            $('#modal-edit').modal('show');
        }        
      })

    });

    //Save update data user
    $('#btn-updateUser').on('click', function(e){
      const formEdit = $('#formEditUser');
      
      $.ajax({
        url: "<?php echo base_url('datamember/update')?>",
        method: "POST",
        data: formEdit.serialize(),
        dataType: "JSON",
        success: function (data) {
          //Data Error
          if(data.error){

            if(data.name_error != '') $('#name_error').html(data.name_error);   
            else $('#name_error').html('');

            if(data.level_id_error != '') $('#level_id_error').html(data.level_id_error);   
            else $('#level_id_error').html('');

            if(data.blocked_error != '') $('#blocked_error').html(data.blocked_error);   
            else $('#blocked_error').html('');
          }

          //Data User Berhasil Disimpan
          if(data.success){
            formEdit.trigger('reset');
            $('#modalEdit').modal('hide');
            $('#name_error').html('');
            $('#level_id_error').html('');
            $('#blocked_error').html('');
            $('#example').DataTable().ajax.reload();
            toastr.info('User data successfully updated.');
          }
            
        }
        
      });

    });

  });

</script>
</body>
</html>
