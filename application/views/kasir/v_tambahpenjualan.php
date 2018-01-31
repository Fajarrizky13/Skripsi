<?php $this->load->view('kasir/sidebar'); ?>
<a class="navbar-brand">Data Penjualan</a>
<?php $this->load->view('kasir/headbar'); ?>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">Ubah Penjualan</h5>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="jenis" class="control-label">Jenis Roti :</label>
            <input type="text" class="form-control" id="jenis">
          </div>
          <div class="form-group">
            <label for="jumlah" class="control-label">Jumlah :</label>
            <input type="number" class="form-control" id="jumlah">
          </div>
          <button type="submit" class="btn btn-fill btn-primary">Save</button>
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
          <form method="post" name="form" id="form" action="<?= site_url(); ?>/c_penjualan/simpan_penjualan">
            <div class="hidden">
              <div class="form-group">
                <div class="form-line">
                  <input type="text" value="0" name="idpenjualan" class="form-control" />
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <div class="form-line">
                  <select class="form-control" name="idroti" data-placeholder="Choose an Option" tabindex="1">
                    <option value="">Select...</option>
                    <?php
                    if (isset($roti)) {
                      foreach ($roti as $row) {
                        ?>
                        <option value="<?php echo $row['idroti']; ?>"><?php echo $row['namaroti']; ?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>    
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <div class="form-line">
                  <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" />
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="button-demo" style="text-align:center;">
                <button type="submit" class="btn bg-blue waves-effect">Submit</button>
              </div>  
            </div>
          </form>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2 style="text-align:center">Rincian Transaksi</h2>
            </div>
            <div class="body">
              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Roti</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody><?php
                $total=0;
                ?>
                <?php $i=1 ?>
                <?php foreach ($penjualanroti as $row){?>
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$row['namaroti']?></td>
                  <td><?=$row['jumlah']?></td>
                  <td><?=$row['harga']?></td>
                  <?php 
                  $jml=$row['jumlah'];
                  $harga=$row['harga'];
                  $hasil=$jml*$harga;
                  $total+=$hasil
                  ?>
                  <td><?php echo $hasil ?></td>
                  <td>
                    <div class="col-sm-2">
                      <div class="demo-google-material-icon" data-toggle="modal" data-target=".bs-example-modal-sm" data-jumlah="<?=$row['jumlah']?>" data-jenis="<?=$row['namaroti']?>"> <b>EDIT</b></div>
                    </div>
                    <div class="col-sm-2">
                      <a href="<?=site_url('c_penjualan/delete/'.$row['idpenjroti'])?>"><div class="demo-google-material-icon"> <i class="material-icons">delete</i>
                      </div></a>
                    </div>
                  </td>
                  <?php }?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Data Pemesanan end-->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 style="text-align:center">Transaksi</h2>
          </div>
          <div class="body">
            <form name="form2" id="form2" method="POST" action="<?=site_url('c_penjualan/selesai_belanja_kasir')?>">
              <div class="col-sm-4">
                <h5>Total</h5>
                <div class="form-group">
                  <div class="form-line focused">
                    <input type="text" class="form-control" name="total_harga" id="total_harga" value="<?php echo $total ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <h5>Bayar</h5>
                <div class="form-group">
                  <div class="form-line focused">
                    <input type="text" class="form-control" onfocus="StartHitung()" onblur="StopHitung()" name="bayar" id="bayar"  value="" onkeypress="return isNumberKey(event)" />
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <h5>Kembalian</h5>
                <div class="form-group">
                  <div class="form-line focused">
                    <input type="text" class="form-control" name="kembalian" id="kembalian" />
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="button-demo" style="text-align:center;">
                  <button type="submit" name="submit" id="submit" value="Selesai" class="btn bg-blue waves-effect">SIMPAN</button>
                </div> 
              </div>
            </form>
          </div>
        </div>
      </div>

    </div> 
  </div>
</div>
<!--Grafik Permintaan end-->
</div>
</div>
</body>
<?php $this->load->view('kasir/footer'); ?>
<script type="text/javascript">
  // $(document).on("click", ".modal", function () {
  //    var jenis = $(this).data('jenis');
  //    var jumlah = $(this).data('jumlah');
  //    $(".modal-body input#jenis").val('a');
  //    $(".modal-body #jumlah").val(jumlah);
  // });
  $(document).on("click", ".modal", function (e) {

    e.preventDefault();

    var _self = $(this);

    var jenis = _self.data('jenis');
    $(".modal-body input#jenis").val('a');

    $(_self.attr('href')).modal('show');
    console.log(jenis);
  });
</script>
</html>

