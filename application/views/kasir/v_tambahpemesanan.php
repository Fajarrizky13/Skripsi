<?php $this->load->view('kasir/sidebar'); ?>
<a class="navbar-brand">Data Pemesanan</a>
<?php $this->load->view('kasir/headbar'); ?>

<!--Grafik Permintaan-->
<div class="content wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <form method="post" name="form" id="form" action="<?= site_url(); ?>/c_pemesanan/simpan_pemesanan">
            <div class="hidden">
              <div class="form-group">
                <div class="form-line">
                  <input type="text" value="0" name="idpemesanan" class="form-control" />
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
                  <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" required />
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
                <?php foreach ($pemesananroti as $row){?>
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
                    <div class="col-xs-1 col-sm-1">
                      <a href="<?=site_url('c_pemesanan/edit/'.$row['idpemroti'])?>"><div class="demo-google-material-icon"> <i class="material-icons">edit</i>
                      </div></a>
                    </div>
                    <div class="col-xs-1 col-sm-1">
                      <a href="<?=site_url('c_pemesanan/delete/'.$row['idpemroti'])?>"><div class="demo-google-material-icon"> <i class="material-icons">delete</i>
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
            <form name="form2" id="form2" method="POST" action="<?=site_url('c_pemesanan/selesai_pesan_kasir')?>">
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
              <div class="col-sm-4">
                <h5>Tanggal Ambil</h5>
                <div class="form-group">
                  <div class="form-line focused">
                    <input type="date" class="form-control" name="tanggal_ambil" />
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <h5>Atas Nama</h5>
                <div class="form-group">
                  <div class="form-line focused">
                    <input type="text" class="form-control" name="atas_nama" />
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
</body>
<?php $this->load->view('pimpinan/footer'); ?>
</html>

