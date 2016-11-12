    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('asset/bower_components/metisMenu/dist/metisMenu.min.js')?>"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('asset/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('asset/dist/js/sb-admin-2.js')?>"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <script type="text/javascript" src="<?php echo base_url('asset/choosen/js/jquery.printPage.js')?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btnPrint").printPage();
        })
    </script>
    </div>
</body>
</html>

