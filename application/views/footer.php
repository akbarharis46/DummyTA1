
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright2021 &copy;<a>PTMILAGROS</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->


<!-- jQuery -->
<script src="<?php echo base_url('assets/admin/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url('assets/admin/dist/js/adminlte.js') ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url('assets/admin/plugins/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/dist/js/demo.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/dist/js/pages/dashboard3.js') ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/admin/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function () {
      
          
        $('select').change(function () {
              if ($('select option[value="' + $(this).val() + '"]:selected').length > 1) {
                $(this).val('-1').change();
                alert('Duplicate entry.')
              }
        });
    });

    
    $('#jumlah_pengiriman_barang').change(function () {
          if ( $('#jumlah_pengiriman_barang').val() > <?= $detailstockproduksi[0]->stock_produksi ?>) {
            alert('Stock Barang Produksi Tidak Mencukupi Untuk Melakukan Pengiriman');
          }
    });

      $('#tabel').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        dom: 'fBrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
      });

      if (window.location.pathname == "/bellecrown/admin/pemesanan") {
        $("#navPemesanan").addClass("active");
      }else if (window.location.pathname == "/bellecrown/admin/home" || window.location.pathname == "/bellecrown/admin/" ){
        $("#navHome").addClass("active");
      }else{
        $("#navData").addClass("active");
      }
</script>

</body>
</html>