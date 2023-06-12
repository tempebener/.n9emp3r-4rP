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

    <script>
        $(function(){
            $(document).on('click','.detail-barang',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post("<?php echo site_url()?>app/detail_barang",
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }
                );
            });
        });
    </script>

    <script>
        $(function(){
            $(document).on('click','.riwayat-pembelian',function(e){
                e.preventDefault();
                $("#myModalRiwayat").modal('show');
                $.post("<?php echo site_url()?>app/detail_pembelian",
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }
                );
            });
        });
    </script>
    <script type="text/javascript">
      
      $(document).ready(function() {
          var table = $('#example').DataTable( {
              lengthChange: false,
              buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
          } );
       
          table.buttons().container()
              .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      } );
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
