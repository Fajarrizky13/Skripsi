<?php $this->load->view('pimpinan/sidebar'); ?>
<a class="navbar-brand">Kebutuhan</a>
<?php $this->load->view('pimpinan/headbar'); ?>

<!--Grafik Permintaan-->
<div class="content wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="col-md-12">
            <div class="card">
              <div class="header">Daftar Kebutuhan (Roti)</div>
              <div class="content">
                <div class="toolbar">
                </div>
                <br>
                <div class="fresh-datatables">
                  <table  id="example1" class="table table-hover table-striped">
                    <thead>
                      <th>No</th>
                      <th>Periode</th>
                      <th>Penjualan aktual</th>
                      <th>Peramalan Penjualan</th>
                      <th>Pemesanan</th>
                      <th class="disabled-sorting text-center">Actions</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class='text-center'>
                          <a href="<?php echo base_url(); ?>index.php/c_bahanbaku/kebutuhanbahan">
                            <button type="submit" class="btn btn-fill btn-info">Lihat Bahan Baku</button>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div> 
  </div>
</div>
</div>
<!--Grafik Permintaan end-->



</div>
</div>
<?php $this->load->view('pimpinan/footer'); ?>

</body>



</html>

