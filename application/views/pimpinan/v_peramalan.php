<?php $this->load->view('pimpinan/sidebar'); ?>
<a class="navbar-brand">Kebutuhan</a>
<?php $this->load->view('pimpinan/headbar'); ?>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Rincian Bahan Baku</h4>
      </div>
      <div class="modal-body">
        <h6 id="namaroti"></h6>
        <div class="row">
            <div class="col-sm-6">
                <table class="table">
                    <tr>
                        <td width="60px"><b>Bulan</b></td>
                        <td width="5px">:</td>
                        <td><span id="bulan"></span></td>
                    </tr>
                    <tr>
                        <td><b>Total</b></td>
                        <td>:</td>
                        <td><span id="total"></span></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-6">
                <table class="table">
                    <tr>
                        <td width="60px"><b>Peramalan</b></td>
                        <td width="5px">:</td>
                        <td><span id="ramal"></span></td>
                    </tr>
                    <tr>
                        <td><b>Pemesanan</b></td>
                        <td>:</td>
                        <td><span id="pesanan"></span></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                        <th>Terigu</th>
                        <th>Telur</th>
                        <th>Mentega</th>
                        <th>Ragi</th>
                        <th>Gula</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span id="terigu"></span></td>
                            <td><span id="telur"></span></td>
                            <td><span id="mentega"></span></td>
                            <td><span id="ragi"></span></td>
                            <td><span id="gula"></span></td>
                        </tr>
                    </tbody>    
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <form method="post" action="<?= site_url(); ?>/c_peramalan/setujuiRencana">
            <input type="hidden" name="idroti">
            <input type="hidden" name="tanggal">
            <button type="submit" class="btn btn-fill btn-success">Approve</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
    </div>
</div>

</div>
</div>

<!--Grafik Permintaan-->
<div class="content wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">Daftar Kebutuhan (Roti)</div>
                            <div class="content">
                                <div class="toolbar">
                                    <form method="post" action="<?= site_url(); ?>/c_peramalan/peramalanRoti">
                                        <div class="form-group">
                                            <label for="idroti">Pilih Roti</label>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <select name="idroti" class="form-control">
                                                        <?php foreach ($data["roti"] as $rot) { ?>
                                                        <option value="<?php echo $rot["idroti"]; ?>"><?php echo $rot["namaroti"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="submit" value="Tampilkan"
                                                    class="btn btn-fill btn-success">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br>
                                <div class="fresh-datatables">
                                    <table id="example2" class="table table-hover table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Periode</th>
                                            <th>Penjualan aktual</th>
                                            <th>Peramalan Penjualan</th>
                                            <th>Pemesanan</th>
                                            <th class="disabled-sorting text-center">Actions</th>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($data["peramalan"])) {
                                                $no = 0;
                                                foreach ($data["peramalan"] as $ramal) { 
                                                    $no++; ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $ramal["bulan"]; ?></td>
                                                        <td><?php echo $ramal["total"]; ?></td>
                                                        <td><?php echo $data["ramal"][$no-1]; ?></td>
                                                        <td><?php echo $data["pesanan"][$no-1]; ?></td>
                                                        <td class='text-center'>
                                                            <a >
                                                                <button type="submit" class="btn btn-fill btn-info open-modal" data-toggle="modal" data-target="#myModal" 
                                                                data-bulan="<?php echo $ramal["bulan"]; ?>"
                                                                data-total="<?php echo $ramal["total"]; ?>"
                                                                data-ramal="<?php echo $data["ramal"][$no-1]; ?>"
                                                                data-pesanan="<?php echo $data["pesanan"][$no-1]; ?>">
                                                                Lihat Bahan Baku
                                                            </button>
                                                        </a>
                                                        
                                                    </td>
                                                </tr>
                                                <?php }
                                            } else { ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class='text-center'>
                                                    <a href="<?php echo base_url(); ?>index.php/c_bahanbaku/kebutuhanbahan">
                                                        <button type="submit" class="btn btn-fill btn-info">Lihat Bahan
                                                            Baku
                                                        </button>
                                                    </a>

                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--Grafik Permintaan end-->


</div>
<?php $this->load->view('pimpinan/footer'); ?>
<script type="text/javascript">
// $('#myModal').on('show.bs.modal', function (e) {
//   console.log($('td.bulan').data('bulan'));
//   $('#bulan').text($('td.bulan').data('bulan'));
// });
$(document).on('click', '.open-modal', function(){
    var bln = $(this).data('bulan');
    var tgl = new Date($(this).data('bulan'));
    tgl.setDate(tgl.getDate() + 1);
    year = tgl.getFullYear();
    month = tgl.getMonth()+1;
    dt = tgl.getDate();

    if (dt < 10) {
      dt = '0' + dt;
    }
    if (month < 10) {
      month = '0' + month;
    }
    var tanggal = year +'-' + month + '-'+dt;

    var jumlah = $(this).data('jumlah');
    var ramal = $(this).data('ramal');
    var pesanan = $(this).data('pesanan');
    var total = ramal+pesanan;
    $('.modal-body #bulan').text(bln);
    $('.modal-body #total').text(total);
    $('.modal-body #ramal').text(ramal);
    $('.modal-body #pesanan').text(pesanan);
    $('input[name=idroti]').val(<?php echo $ramal['id_roti']?>);
    $('input[name=tanggal]').val(tanggal);

    $.ajax({
     type: "GET",
     url: "<?php echo base_url(); ?>index.php/c_bahanbaku/kebutuhanbahan?id=<?php echo $ramal['id_roti']?>&tanggal=" + bln,
     data: bln,
     success: function(result){
        res = $.parseJSON(result);
        console.log(res);

        $('.modal-body #namaroti').text(res.roti.namaroti);

        var terigu = res.kebutuhan[0].total * res.resep[0].jumlah;
        var telur = res.kebutuhan[0].total * res.resep[1].jumlah;
        var mentega = res.kebutuhan[0].total * res.resep[2].jumlah;
        var ragi = res.kebutuhan[0].total * res.resep[3].jumlah;
        var gula = res.kebutuhan[0].total * res.resep[4].jumlah;
        $('.modal-body #terigu').text(terigu);
        $('.modal-body #telur').text(telur);
        $('.modal-body #mentega').text(mentega);
        $('.modal-body #ragi').text(ragi);
        $('.modal-body #gula').text(gula);
    }
});

});
</script>
</body>


</html>

