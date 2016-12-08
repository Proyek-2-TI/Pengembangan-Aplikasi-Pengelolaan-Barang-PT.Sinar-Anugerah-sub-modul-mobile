    </div>
     <!--END MAIN WRAPPER -->
    <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo base_url('assets/adminTemplates/plugins/jquery-2.0.3.min.js')?>"></script>
    <script src="<?php echo base_url('assets/adminTemplates/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/adminTemplates/plugins/modernizr-2.6.2-respond-1.1.0.min.js')?>"></script>
    <!-- END GLOBAL SCRIPTS -->   

    <!-- PAGE DataTables LEVEL SCRIPTS -->
    <script src="<?php echo base_url('assets/adminTemplates/plugins/dataTables/jquery.dataTables.js')?>"></script>
    <script src="<?php echo base_url('assets/adminTemplates/plugins/dataTables/dataTables.bootstrap.js')?>"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
         <!-- PAGE LEVEL FilesUpload SCRIPTS -->
    <script src="<?php echo base_url('assets/adminTemplates/plugins/jasny/js/bootstrap-fileupload.js')?>"></script>
    <!-- PAGE FormValidation LEVEL SCRIPTS -->
    <script src="<?php echo base_url('assets/adminTemplates/plugins/validationengine/js/jquery.validationEngine.js')?>"></script>
    <script src="<?php echo base_url('assets/adminTemplates/plugins/validationengine/js/languages/jquery.validationEngine-en.js')?>"></script>
    <script src="<?php echo base_url('assets/adminTemplates/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js')?>"></script>
    <script src="<?php echo base_url('assets/adminTemplates/js/validationInit.js')?>"></script>
    <script>
        $(function () { formValidation(); });
        </script>
     <!--END PAGE LEVEL SCRIPTS --></body>
     <!-- END BODY -->
</html>
