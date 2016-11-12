<!-- ===========================================    Tambah Pemesanan     ======================================= -->
<!-- ===========================================         sec 2           ======================================= -->
<from id="defaultForm">
<?php
if(isset($detail_barang)){
    foreach($detail_barang as $row){
        ?>
        <div class="col-lg-12">
            <div class="dataTable_wrapper">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Nama barang</th>
                    <th>Stok</th>
                    <th>Jumlah Return </th>
                    <th>Keterangan </th>
                </thead>
                <tbody>
                    <td><input class="form-control" name="nm_barang" type="text" value="<?php echo $row->nm_barang; ?>" readonly="readonly"></td>
                    <td><input class="form-control" id="stok" name="stok" type="text" value="<?php echo $row->stok; ?>" readonly="readonly"></td>
                    <td><input class="form-control" name="rusak" type="text" class="" placeholder="Input jumlah yand dikembalikan..." required></td>
                    <td><input class="form-control" name="ket" type="text" class="" placeholder="Input keterangan..." required></td>
                </tbody>
            </table>
            </div>
        </div>
    <?php
    }
}
?>

<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            rusak: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'jumlah return harus di isi'
                    },
                    numeric: {
                      message: 'jumlah return harus di isi dengan angka'
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>
