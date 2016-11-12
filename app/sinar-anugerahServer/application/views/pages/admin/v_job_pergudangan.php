<!--========================= Content Wrapper ==============================-->
<div class="tabbable tabs-left">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tabBarang" data-toggle="tab"><strong>Pemesanan Barang</strong></a></li>
        <li><a href="#tabBarangMasuk" data-toggle="tab"><strong>Barang Masuk</strong></a></li>
        <li><a href="#tabBarangReturn" data-toggle="tab"><strong>Barang Return</strong></a></li>                
    </ul>
    <div class="tab-content">
        <div class="tab-pane" id="tabBarangMasuk">
            <?php $this->load->view('pages/barang_masuk/v_barang_masuk')?>
        </div>
        <div class="tab-pane" id="tabBarangReturn">
            <?php $this->load->view('pages/barang_return/v_barang_return')?>
        </div>
        <div class="tab-pane  active" id="tabBarang">
            <?php $this->load->view('pages/pemesanan/v_pemesanan')?>
        </div>
    </div>
</div>