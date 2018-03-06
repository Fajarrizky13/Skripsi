<?php $this->load->view('kasir/sidebar'); ?>
<a class="navbar-brand">Data Penjualan</a>
<?php $this->load->view('kasir/headbar'); ?>

<div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalUbah" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">Ubah Penjualan</h5>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= site_url(); ?>/c_penjualan/ubah_jumlah">
          <input type="hidden" name="id" class="form-control" id="id">
          <div class="form-group">
            <label for="jenis" class="control-label">Jenis Roti :</label>
            <input type="text" name="jenis" class="form-control" id="jenis" disabled>
          </div>
          <div class="form-group">
            <label for="jumlah" class="control-label">Jumlah :</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah">
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
          <form method="post" name="form" id="form" action="<?= site_url(); ?>/c_penjualan/simpan_penjualan" autocomplete="off">
            <div class="hidden">
              <div class="form-group">
                <div class="form-line">
                  <input type="text" value="0" name="idpenjualan" class="form-control" />
                </div>
              </div>
            </div>
            <div class="header">Tambah Penjualan</div>
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
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" />
              </div>
              <div class="button-demo" style="text-align:center;">
                <button type="submit" class="btn btn-fill btn-info" class="btn bg-blue waves-effect">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-8">
            <div class="card">
              <div class="header">Rincian Penjualan</div>
              <div class="content">
                <div class="body">
                  <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Jenis Roti</th>
                        <th>Jumlah</th>
                        <th>Harga (Rp)</th>
                        <th>Sub Total (Rp)</th>
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
                        <div class="col-sm-4">
                          <div style="cursor: pointer" class="demo-google-material-icon open-modal" data-toggle="modal" data-target="#modalUbah" data-jumlah="<?=$row['jumlah']?>" data-jenis="<?=$row['namaroti']?>" data-id="<?=$row['idpenjroti']?>">
                            <b button type="submit" class="btn btn-fill btn-info" class="btn bg-blue waves-effect">Ubah</b>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <a href="<?=site_url('c_penjualan/delete/'.$row['idpenjroti'])?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');">
                            <b button type="submit" class="btn btn-danger btn-fill">Hapus</b>
                          </a>
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
        <!-- Data Penjualan end-->
        <div class="col-md-4">
          <!-- <div class="card"> -->
          <div class="body">
            <form name="form2" id="form2" method="POST" action="<?=site_url('c_penjualan/selesai_belanja_kasir')?>">
              <div class="col-sm-12">
                <a>Total<a>
                  <div class="form-group">
                    <div class="form-line focused">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <a>Rp.</a>
                        </div>
                        <input type="text" class="form-control" name="total_harga" id="total_harga" value=" <?php echo $total ?>" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-12">
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
                  <div class="col-sm-12">
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
                      <div class="col-sm-12">
                        <div class="button-demo" style="text-align:center;">
                          <button button type="submit" class="btn btn-fill btn-info" class="btn bg-blue waves-effect">SIMPAN</button>
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
      <?php $this->load->view('kasir/footer'); ?>
      <script type="text/javascript">
      $(document).on('click', '.open-modal', function(){
        $('.modal-body #id').val($(this).data('id'));
        $('.modal-body #jenis').val($(this).data('jenis'));
        $('.modal-body #jumlah').val($(this).data('jumlah'));
      });
      </script>
      </html>

 