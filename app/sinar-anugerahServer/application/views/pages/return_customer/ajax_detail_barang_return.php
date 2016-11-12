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
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Return</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    <td><input class="form-control" name="kd_barang" type="text" value="<?php echo $row->kd_barang; ?>" readonly="readonly"></td>
                    <td><input class="form-control" id="nm_barang" name="nm_barang" type="text" value="<?php echo $row->nm_barang; ?>" readonly="readonly"></td>
                    <td><input class="form-control" id="nm_barang" name="d_rusak" type="text" placeholder = "masukan ulang jumlah return . . " required></td>
                    <td>
                    <select class="form-control" name="status">
                        <option class="form-control" value="diterima">Diterima</option>
                        <option class="form-control" value="ditolak">Ditolak</option>
                    </select>                        
                    </td>
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