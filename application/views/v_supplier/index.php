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
              <li class="breadcrumb-item active"><i class="fas fa-user-check"></i> Supplier</li>
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
                <h3 class="card-title">Supplier</h3>
                <div class="float-sm-right">
                  <a class="btn btn-success btn-xs" href="frsHelpdeskUsers.php?act=add" title="Add new"><i class="fa fa-plus"></i> <span class="hidden-xs hidden-sm">Add New</span></a>
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

    <!-- Modal Edit Supplier -->
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
  <?php 
    $category = $kategoriSupplier['category'];
    $link = site_url('banksoal/ajaxGetSupplier/'.$category);
  ?>
  $(document).ready(function() {



    //Menampilkan data bank soal (dataTable server-side) berdasarkan Id kategori soal
    $('#example').DataTable({ 
        "processing" : true, //Feature control the processing indicator.
        "serverSide" : true, //Feature control DataTables' server-side processing mode.
        "order"    : [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url" : "<?php echo $link; ?>",
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

    //Save input data bank soal
    $('#btn-saveSupplier').on('click', function(){
      const category = $('#addSupplier').attr('value');
      const form = $('#formInputSupplier');
      
      $.ajax({
        url: "<?php echo base_url('supplier/add/')?>" + category,
        method: "POST",
        data: form.serialize(),
        dataType: "JSON",
        success: function (data) {
          //Data Error
          if(data.error){

            if(data.pertanyaan_error != '') $('#pertanyaan_error').html(data.pertanyaan_error);   
            else $('#pertanyaan_error').html('');

            if(data.pilihan_a_error != '') $('#pilihan_a_error').html(data.pilihan_a_error);   
            else $('#pilihan_a_error').html('');

            if(data.pilihan_b_error != '') $('#pilihan_b_error').html(data.pilihan_b_error);   
            else $('#pilihan_b_error').html('');

            if(data.pilihan_c_error != '') $('#pilihan_c_error').html(data.pilihan_c_error);   
            else $('#pilihan_c_error').html('');

            if(data.pilihan_d_error != '') $('#pilihan_d_error').html(data.pilihan_d_error);   
            else $('#pilihan_d_error').html('');

            if(data.pilihan_e_error != '') $('#pilihan_e_error').html(data.pilihan_e_error);   
            else $('#pilihan_e_error').html('');

            if(data.nilai_a_error != '') $('#nilai_a_error').html(data.nilai_a_error);   
            else $('#nilai_a_error').html('');
            
            if(data.nilai_b_error != '') $('#nilai_b_error').html(data.nilai_b_error);   
            else $('#nilai_b_error').html('');

            if(data.nilai_c_error != '') $('#nilai_c_error').html(data.nilai_c_error);   
            else $('#nilai_c_error').html('');

            if(data.nilai_d_error != '') $('#nilai_d_error').html(data.nilai_d_error);   
            else $('#nilai_d_error').html('');

            if(data.nilai_e_error != '') $('#nilai_e_error').html(data.nilai_e_error);   
            else $('#nilai_e_error').html(''); 
          }

          //Data Supplier Berhasil Disimpan
          if(data.success){
            form.trigger('reset');
            $('#modalAdd').modal('hide');
            //$('.textarea').next().find(".note-editable").text("");
            $('.textarea').summernote('code', '');
            $('#pertanyaan_error').html('');
            $('#pilihan_a_error').html('');
            $('#pilihan_b_error').html('');
            $('#pilihan_c_error').html('');
            $('#pilihan_d_error').html('');
            $('#pilihan_e_error').html('');
            $('#nilai_a_error').html(''); 
            $('#nilai_b_error').html(''); 
            $('#nilai_c_error').html(''); 
            $('#nilai_d_error').html(''); 
            $('#nilai_e_error').html(''); 
            $('#example').DataTable().ajax.reload();
            toastr.success('Data bank soal berhasil disimpan.');
          }
            
        }
        
      });

    });

    //Hapus data bank soal
    $('body').on('click', '.btn-delete', function (e) {
      e.preventDefault();

      //Alamat Controller Delete Supplier
      const url = $(this).attr('href');

      Swal.fire({
        title: 'Hapus Data?',
        text: "Anda ingin menghapus data bank soal ini?",
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
                toastr.error('Data bank soal berhasil dihapus.');
            }
          });

        }

      });
    });

    //Tampil modal edit data bank soal
    $('body').on('click', '.btn-edit', function (e) {
      e.preventDefault();
      const account = $(this).attr('value');

      $.ajax({
        url : "<?php echo base_url('banksoal/ajaxUpdate/')?>" + account,
        type: "GET",
        dataType: "JSON", 
        success: function(data)
        {
            $('.textarea2').summernote('code', data.name);
            $('[name="category"]').val(data.category);
            $('[name="account"]').val(data.account);
            $('[name="name"]').val(data.name);
            $('[name="city"]').val(data.city);
            $('[name="email_address"]').val(data.email_address);
            $('[name="contact_person"]').val(data.contact_person);
            $('[name="limit_credit"]').val(data.limit_credit);
            $('#modal-edit').modal('show');
        }        
      })

    });

    //Save update data bank soal
    $('#btn-updateSupplier').on('click', function(e){
      const formEdit = $('#formEditSupplier');
      
      $.ajax({
        url: "<?php echo base_url('banksoal/update')?>",
        method: "POST",
        data: formEdit.serialize(),
        dataType: "JSON",
        success: function (data) {
          //Data Error
          if(data.error){

            if(data.pertanyaan2_error != '') $('#pertanyaan2_error').html(data.pertanyaan2_error);   
            else $('#pertanyaan2_error').html('');

            if(data.pilihan_a2_error != '') $('#pilihan_a2_error').html(data.pilihan_a2_error);   
            else $('#pilihan_a2_error').html('');

            if(data.pilihan_b2_error != '') $('#pilihan_b2_error').html(data.pilihan_b2_error);   
            else $('#pilihan_b2_error').html('');

            if(data.pilihan_c2_error != '') $('#pilihan_c2_error').html(data.pilihan_c2_error);   
            else $('#pilihan_c2_error').html('');

            if(data.pilihan_d2_error != '') $('#pilihan_d2_error').html(data.pilihan_d2_error);   
            else $('#pilihan_d2_error').html('');

            if(data.pilihan_e2_error != '') $('#pilihan_e2_error').html(data.pilihan_e2_error);   
            else $('#pilihan_e2_error').html('');

            if(data.nilai_a2_error != '') $('#nilai_a2_error').html(data.nilai_a2_error);   
            else $('#nilai_a2_error').html('');
            
            if(data.nilai_b2_error != '') $('#nilai_b2_error').html(data.nilai_b2_error);   
            else $('#nilai_b2_error').html('');

            if(data.nilai_c2_error != '') $('#nilai_c2_error').html(data.nilai_c2_error);   
            else $('#nilai_c2_error').html('');

            if(data.nilai_d2_error != '') $('#nilai_d2_error').html(data.nilai_d2_error);   
            else $('#nilai_d2_error').html('');

            if(data.nilai_e2_error != '') $('#nilai_e2_error').html(data.nilai_e2_error);   
            else $('#nilai_e2_error').html(''); 
          }

          //Data Supplier Berhasil Disimpan
          if(data.success){
            formEdit.trigger('reset');
            $('#modalEdit').modal('hide');
            $('.textarea').next().find(".note-editable").text("");
            $('#pertanyaan2_error').html('');
            $('#pilihan_a2_error').html('');
            $('#pilihan_b2_error').html('');
            $('#pilihan_c2_error').html('');
            $('#pilihan_d2_error').html('');
            $('#pilihan_e2_error').html('');
            $('#nilai_a2_error').html(''); 
            $('#nilai_b2_error').html(''); 
            $('#nilai_c2_error').html(''); 
            $('#nilai_d2_error').html(''); 
            $('#nilai_e2_error').html(''); 
            $('#example').DataTable().ajax.reload();
            toastr.info('Data bank soal berhasil diupdate.');
          }
            
        }
        
      });

    });

    // Summernote
    $('.textarea').summernote({
      placeholder: 'Enter Pertanyaan Soal....',
      height: 200,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
    });
    $('.textarea2').summernote({
      placeholder: 'Enter Pertanyaan Soal....',
      height: 200,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
    });
    
  });

</script>
</body>
</html>
