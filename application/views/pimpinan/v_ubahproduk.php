<?php $this->load->view('pimpinan/sidebar'); ?>
<a class="navbar-brand">Data Produk</a>
<?php $this->load->view('pimpinan/headbar'); ?>

<!--Grafik Permintaan-->
<div class="content wrapper">
  <div class="container-fluid">
    <div class="row">
     <div class="col-md-12">
      <div class="card">
        <form role="form" action="<?php echo base_url('index.php/c_produk/ubahProduk/'.$detail['idroti']) ?>" method="post">
          <div class="header">Ubah Produk</div>
          <div class="content">
            <div class="form-group">
              <label>Jenis Rori</label>
              <input type="text"  name="namaroti" value="<?php echo $detail['namaroti']; ?>" placeholder="masukkan nama pengguna" class="form-control" id="exampleInput">
            </div>
            <div class="form-group">
              <label>Harga (Rp.)</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <a> Rp.</a>
                </div>
                <input type="text"  name="harga" value="<?php echo $detail['harga']; ?>" placeholder="masukkan harga" class="form-control" required>
              </div>
            </div>
             <div class="form-group">
              <label></label>
              <button type="submit" value="update" class="btn btn-fill btn-info">Ubah</button>
              <a href="<?php echo base_url('index.php/c_produk/produk'); ?>" class="btn btn-danger btn-fill ">Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div> 
    <!-- Data Reseller end-->

  </div> 
</div>
</div>
<!--Grafik Permintaan end-->
</body>
<?php $this->load->view('pimpinan/footer'); ?>
</html>

