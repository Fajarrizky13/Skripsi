<?php $this->load->view('pengadaan/sidebar'); ?>
<a class="navbar-brand">Data Bahan Baku</a>
<?php $this->load->view('pengadaan/headbar'); ?>

<div class="content wrapper">
  <div class="container-fluid">
    <div class="row">
      <!-- Data Bahan Baku -->
      <div class="col-md-12">
        <div class="card">
          <div class="header">Data Bahan Baku</div>
          <div class="content">
            <div class="toolbar">
              <button type="submit" class="btn btn-fill btn-info" data-toggle="modal" data-target="#tambahdata" >Tambah Reseller</button>
            </div>
            <div class="fresh-datatables">
              <table class="table table-hover table-striped">
                <thead>
                  <th>ID Bahan Baku</th>
                  <th>Nama Bahan Bakur</th>
                  <th>Harga</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    $no = 1;
                    foreach ($bahanbaku as $row){
                      ?>
                      <td><?= $no ?></td>
                      <td><?= $row['bahan']?></td>
                      <td><?= $row['jumlah']?></td>
                      
                      <td class="text-right">
                        <a class="btn btn-simple btn-info btn-icon table-action view" rel="tooltip" title="View"  href=""><i class="fa fa-image"></i></a>
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
      <!-- Data Bahan Baku end-->
    </div> 
  </div>

  





</div>
</div>



</body>
<?php $this->load->view('pengadaan/footer'); ?>

</html>

