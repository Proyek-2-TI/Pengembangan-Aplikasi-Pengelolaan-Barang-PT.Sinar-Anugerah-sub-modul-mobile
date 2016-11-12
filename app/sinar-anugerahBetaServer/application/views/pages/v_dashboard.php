<!--========================= Content Wrapper ==============================-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                 </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<?php if(isset($dt_contact)){
foreach($dt_contact as $row){
?>
    <h1 class="text-info" style="text-align: center"><?php echo $row->NM_CONTACT?></h1>
    <br/>
    <div class="row well" style="text-align: center">
        <h4><?php echo $row->DESC_CONTACT?></h4>
        <h5 class="muted"><?php echo $row->ALMT_CONTACT?></h5>
        <h5 class="muted"><?php echo $row->EMAIL_CONTACT?> || <?php echo $row->TLPN_CONTACT?> || <?php echo $row->WBSITE_CONTACT?></h5>

    </div>
<?php }
}
?>
</div>