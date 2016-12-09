<?php
if(isset($detail_customer)){
    foreach($detail_customer as $row){
        ?>
        <label class="control-label">Alamat</label>
            <input class="form-control" id="disabledInput" name="alamat" type="text" value="<?php echo $row->ALMT_CUSTOMER; ?>" 
        readonly="readonly">
        <label class="control-label">Email</label>
            <input class="form-control" name="email" id="disabledInput" type="text" value="<?php echo $row->EMAIL_CUSTOMER; ?>" 
        readonly="readonly">
    <?php
    }
}
?>
