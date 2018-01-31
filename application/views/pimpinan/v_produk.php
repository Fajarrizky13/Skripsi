<?php $this->load->view('pimpinan/sidebar'); ?>
<a class="navbar-brand">Data Produk</a>
<?php $this->load->view('pimpinan/headbar'); ?>

<!--Grafik Permintaan-->
<div class="content wrapper">
  <div class="container-fluid">
    <div class="row">

      <!-- Tabel jumlah produk -->
      <div class="col-md-12">
        <div class="card">
          <div class="header">Daftar Produk</div>
          <div class="content">
            <div class="toolbar">
             <a href="<?php echo base_url('index.php/c_produk/formTambahProduk'); ?>" class="btn btn-primary" type="button">Tambah Data</a>
           </div>
           <br>
           <div class="fresh-datatables">
            <table  id="example1" class="table table-hover table-striped">
              <thead>
                <th>ID</th>
                <th>Jenis Roti</th>
                <th>Harga (Rp.)</th>
                <th class="disabled-sorting text-right">Actions</th>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($produk as $row){
                  ?>
                  <td><?= $no ?></td>
                  <td><?= $row['namaroti']?></td>
                  <td>
                    <a> Rp.</a>
                    <?= $row['harga']?>
                  </td>
                  <td class="text-right">
                    <a class="btn btn-simple btn-info btn-icon table-action view" rel="tooltip" title="Lihat"  href="<?php echo base_url('index.php/c_produk/detailProduk/'.$row['idroti']); ?>"><i class="fa fa-image"></i></a>
                    <a  class="btn btn-simple btn-warning btn-icon table-action edit" rel="tooltip" title="Ubah" href="<?php echo base_url('index.php/c_produk/formUbahProduk/'.$row['idroti']); ?>" ><i class="fa fa-edit"></i></a>
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
  <!-- Tabel jumlah produk end -->  
</div> 
</div>
</div>
<!--Grafik Permintaan end-->

</div>
</div>
</body>
<?php $this->load->view('pimpinan/footer'); ?>
</html>

