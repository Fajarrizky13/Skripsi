<?php $this->load->view('produksi/sidebar'); ?>
<a class="navbar-brand">Produksi</a>
<?php $this->load->view('produksi/headbar'); ?>

<div class="modal fade" id="lihatBahan" role="dialog">
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
                        <td width="60px"><b>Tanggal</b></td>
                        <td width="5px">:</td>
                        <td><span id="tanggal"></span></td>
                    </tr>
                    
                </table>
            </div>
            <div class="col-sm-6">
                <table class="table">
                    <tr>
                        <td><b>Total</b></td>
                        <td>:</td>
                        <td><span id="jumlah"></span></td>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>

<a class="navbar-brand">Dashboard Produksi</a>

<?php $this->load->view('produksi/headbar'); ?>
<div class="content wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="col-md-12">
            <div class="card">
              <div class="header" id="asd">Rencana Produksi</div>
              <div class="content">
                <div class="toolbar">
                  <form method="post" action="<?= site_url(); ?>/c_bahanBaku/produksi">
                    <div class="form-group">
                      <label for="idroti">Pilih Roti</label>
                      <div class="row">
                        <div class="col-md-3">
                          <select name="idroti" class="form-control">
                            <?php foreach ($roti as $rot) { ?>
                            <option value="<?php echo $rot["idroti"]; ?>" <?php if($idroti == $rot["idroti"]) echo 'selected' ?>><?php echo $rot["namaroti"]; ?></option>
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
                  <table  id="example1" class="table table-hover table-striped">
                    <thead>
                      <th>ID</th>
                      <th>tanggal</th>
                      <th>jumlah</th>
                      <th>Status</th>
                      <th class="disabled-sorting text-right">Actions</th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($rincianbahan as $row){
                        ?>
                        <td><?= $no ?></td>
                        <td><?= $row['tanggal']?></td>
                        <td><?= $row['jumlah']?></td>
                        <td><?= $row['status']?></td>
                        <td class="text-right">
                          <a class="btn btn-simple btn-warning btn-icon table-action open-modal" rel="tooltip" data-toggle="modal" data-target="#lihatBahan" title="Lihat bahan" data-namaroti="<?= $row['namaroti'] ?>" data-tanggal="<?php echo $row["tanggal"]; ?>" data-jumlah="<?php echo $row["jumlah"]; ?>">Lihat Bahan</a>
                        </td>
                      </tr>
                      <?php
                      $no++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>  
      </div> 
    </div>
  </div>
  <!--Grafik Permintaan end-->
</body>
<?php $this->load->view('produksi/footer'); ?>

<script type="text/javascript">
$(document).on('click','.open-modal', function(){
    
    var tgl = new Date($(this).data('tanggal'));
    tgl.setDate(tgl.getDate() - 1);
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
    var namaroti = $(this).data('namaroti');
    $('.modal-body #namaroti').text(namaroti);
    $('.modal-body #tanggal').text($(this).data('tanggal'));
    $('.modal-body #jumlah').text(jumlah);

   $.ajax({
     type: "GET",
     url: "<?php echo base_url(); ?>index.php/c_bahanbaku/kebutuhanbahan?id=<?php echo $idroti?>&tanggal=" + tanggal,
     data: tanggal,
     success: function(result){
        res = $.parseJSON(result);
        console.log(res);

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
</html>