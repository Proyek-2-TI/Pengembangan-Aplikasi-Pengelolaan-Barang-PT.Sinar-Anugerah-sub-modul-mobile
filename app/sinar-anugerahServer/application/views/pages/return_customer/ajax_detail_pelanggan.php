<?php
if(isset($detail_pelanggan)){
    foreach($detail_pelanggan as $row){
        ?>

            <label class="control-label">Alamat</label>
                <input class="form-control" id="disabledInput" name="alamat" type="text" value="<?php echo $row->alamat; ?>" readonly="readonly">
            <label class="control-label">Email</label>
                <input class="form-control" name="email" id="disabledInput" type="text" value="<?php echo $row->email; ?>" readonly="readonly">
    <?php
    }
}
?>
