<?php $this->load->view('pimpinan/sidebar'); ?>
<a class="navbar-brand">Data Produk</a>
<?php $this->load->view('pimpinan/headbar'); ?>

<!--Grafik Permintaan-->
<div class="content wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <form action="<?= base_url(); ?>index.php/c_produk/tambahProduk" method="post" enctype="multipart/form-data">
            <div class="header">Tambah Produk</div>
            <div class="content">
              <div class="form-group">
                <label>Jenis Roti</label>
                <input type="text"  name="namaroti" placeholder="masukkan nama produk" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Harga (Rp.)</label>
                <div class="input-group">
                <div class="input-group-addon">
                  <a> Rp.</a>
                </div>
                <input type="text"  name="harga" placeholder="masukkan harga" class="form-control" required>
              </div>
              </div>
              <div class="form-group">
                <label></label>
                <button type="submit" value="submit" class="btn btn-fill btn-info">Simpan</button>
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
</div>
</div>
</body>
<?php $this->load->view('pimpinan/footer'); ?>
</html>

