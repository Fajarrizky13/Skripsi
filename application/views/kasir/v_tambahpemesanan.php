<?php $this->load->view('kasir/sidebar'); ?>
<a class="navbar-brand">Data Pemesanan</a>
<?php $this->load->view('kasir/headbar'); ?>

<div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalUbah" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">Ubah Pemesanan</h5>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= site_url(); ?>/c_pemesanan/ubah_jumlah">
          <input type="hidden" name="id" class="form-control" id="id">
          <div class="form-group">
            <label for="jenis" class="control-label">Jenis Roti :</label>
            <input type="text" name="jenis" class="form-control" id="jenis" disabled>
          </div>
          <div class="form-group">
            <label for="jumlah" class="control-label">Jumlah :</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah">
          </div>
          <button type="submit" class="btn btn-fill btn-primary">Simpan</button>
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
          <form method="post" name="form" id="form" action="<?= site_url(); ?>/c_pemesanan/simpan_pemesanan">
            <div class="hidden">
              <div class="form-group">
                <div class="form-line">
                  <input type="text" value="0" name="idpemesanan" class="form-control" />
                </div>
              </div>
            </div>
<<<<<<< HEAD
            <div class="header">Tambah Pemesanan</div>
=======
            <div class="header">Tambah Penjualan</div>
>>>>>>> 54cdfbad7b125a5aed801ecdbd4e7d94616a7427
            <div class="content">
              <div class="form-group">
                <label>Jenis Roti</label>
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
            <div class="content">
              <div class="form-group">
                <label>Masukan Jumlah</label>
                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" required />
              </div>
              <div class="button-demo" style="text-align:center;">
                <button type="submit" class="btn bg-blue waves-effect">Submit</button>
              </div>  
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-8">
            <div class="card">
              <div class="header">Rincian Pemesanan</div>
              <div class="content">
                <div class="body">
<<<<<<< HEAD
                  <table class="table table-hover table-striped">
=======
                  <table class="table table-bordered table-striped">
>>>>>>> 54cdfbad7b125a5aed801ecdbd4e7d94616a7427
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
                        <div class="col-sm-4">
                          <div style="cursor: pointer" class="demo-google-material-icon open-modal" data-toggle="modal" data-target="#modalUbah" data-jumlah="<?=$row['jumlah']?>" data-jenis="<?=$row['namaroti']?>" data-id="<?=$row['idpemroti']?>">
                            <b button type="submit" class="btn btn-fill btn-info" class="btn bg-blue waves-effect">Ubah</b>
                          </div>
                        </div>
                        <div class="col-sm-4">
<<<<<<< HEAD
                          <a href="<?=site_url('c_pemesanan/delete/'.$row['idpemroti'])?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');">
                            <b button type="submit" class="btn btn-danger btn-fill">delete</b>
                          </a>
=======
                          <a href="<?=site_url('c_pemesanan/delete/'.$row['idpemroti'])?>"><div class="demo-google-material-icon"> <i class="material-icons">delete</i>
                          </div></a>
>>>>>>> 54cdfbad7b125a5aed801ecdbd4e7d94616a7427
                        </div>
                      </td>
                      <?php }?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Data Pemesanan end-->
        <div class="col-md-4" style="padding:0px;">
          <!-- <div class="body"> -->
          <form name="form2" id="form2" method="POST" action="<?=site_url('c_pemesanan/selesai_pesan_kasir')?>">
            <div class="col-md-12">
              <a>Total</a>
              <div class="form-group">
                <div class="form-line focused">
                  <div class="input-group">
                    <div class="input-group-addon">
                     <a>Rp.</a>
                   </div>
                   <input type="text" class="form-control" name="total_harga" id="total_harga" value="<?php echo $total ?>"/>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-md-12">
            <a>Bayar<a>
              <div class="form-group">
                <div class="form-line focused">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <a>Rp.</a>
                    </div>
                    <input type="text" class="form-control" onfocus="StartHitung()" onblur="StopHitung()" name="bayar" id="bayar"  value="" onkeypress="return isNumberKey(event)" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <a>Kembalian<a>
                <div class="form-group">
                  <div class="form-line focused">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <a>Rp.</a>
                      </div>
                      <input type="text" class="form-control" name="kembalian" id="kembalian" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <a>Tanggal Ambil</a>
                <div class="form-group">
                  <input type="date" class="form-control" name="tanggal_ambil" />
                </div>
              </div>
              <div class="col-md-12">
                <a>Atas Nama</a>
                <div class="form-group">
                  <input type="text" class="form-control" name="atas_nama" />
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
</body>
<?php $this->load->view('pimpinan/footer'); ?>
<script type="text/javascript">
$(document).on('click', '.open-modal', function(){
  $('.modal-body #id').val($(this).data('id'));
  $('.modal-body #jenis').val($(this).data('jenis'));
  $('.modal-body #jumlah').val($(this).data('jumlah'));
});
</script>
</html>

