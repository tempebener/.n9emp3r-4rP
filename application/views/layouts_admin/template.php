<!DOCTYPE html>
<html>
  <!-- Head -->
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
        <section class="content">

            <?php echo $contents; ?>
        </section>
      </div><!-- /.content-wrapper -->
      <?php 
        //Footer
        $this->load->view('layouts_admin/footer');
      ?>
    </div><!-- ./wrapper -->

    <?php 
      //Script
      $this->load->view('layouts_admin/script'); 
    ?>

    <!-- <script type="text/javascript">
        $(document).ready(function(){
          $('.combobox').combobox()
        });
    </script> -->

    <!-- <script>
      $(function () {
        $(".textarea").wysihtml5();
      });

      CKEDITOR.replace('editor1' ,{
        filebrowserImageBrowseUrl : '<?php echo base_url('asset/kcfinder'); ?>'
      });
    </script> -->
    
    <script type="text/javascript">
      
      $(document).ready(function() {
          var table = $('#example').DataTable( {
              lengthChange: false,
              buttons: [ 'excel']
          } );
       
          table.buttons().container()
              .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      } );
    </script>

    <script type="text/javascript">
      $("input#username").on({
        keydown: function(e) {
          if (e.which === 32)
            return false;
        },
        change: function() {
          this.value = this.value.replace(/\s/g, "");
        }
      });
    </script>

    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer"></div>
          </div>
      </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="myModalRiwayat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer"></div>
          </div>
      </div>
    </div>

  </body>
</html>
