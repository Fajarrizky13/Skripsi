<?php $this->load->view('pimpinan/sidebar'); ?>
<a class="navbar-brand">Data Produk</a>
<?php $this->load->view('pimpinan/headbar'); ?>

<div class="content wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="col-md-12">
            <div class="card">
              <div class="header">rencana</div>
              <div class="content">
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
                    foreach ($rencanaproduksi as $row){
                      ?>
                      <td><?= $no ?></td>
                      <td><?= $row['tanggal']?></td>
                      <td><?= $row['jumlah']?></td>
                      <td><?= $row['status']?></td>
                      <td class="text-right">
                        <a  class="btn btn-simple btn-warning btn-icon table-action edit" rel="tooltip" value="update" title="Ubah" href="<?php echo base_url('index.php/c_bahanbaku/validasikebutuhanbahan/'.$row['idrencana']); ?>" ><i class="fa fa-edit"></i></a>
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
<?php $this->load->view('pimpinan/footer'); ?>
</html>

