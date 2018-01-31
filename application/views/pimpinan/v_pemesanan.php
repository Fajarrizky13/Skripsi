<?php $this->load->view('pimpinan/sidebar'); ?>
<a class="navbar-brand">Data pemesanan</a>
<?php $this->load->view('pimpinan/headbar'); ?>

<!--Grafik Permintaan-->
<div class="content wrapper">
	<div class="container-fluid">
		<div class="row">

			<!-- Tabel jumlah produk -->
			<div class="col-md-12">
				<div class="card">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="header">Data Rekap Pemesanan</div>
						<div class="content">
							<div class="form-group">
								<div class="row">
									<div class="col-md-3 form-group">
										<input type="date"  name="tanggal" placeholder="masukkan nama pengguna" class="form-control" required>
									</div> 
									<div class="col-md-3 form-group"> 
										<button type="submit" class="btn btn-fill btn-info">Lihat</button>
									</div>  
								</div>
							</div>
						</div>
					</form>
					<div class="content">
						<div class="fresh-datatables">
							<table  id="example1" class="table table-hover table-striped">
								<thead>
									<th>No</th>
									<th>Tanggal Pemesanan</th>
									<th>Tanggal Pengambilan</th>
									<th>Nama Roti</th>
									<th>Jumlah</th>
									<th>Atas Nama</th>
									<th class="disabled-sorting text-center">Actions</th>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pemesanan as $row){
										?>
										<td><?= $no ?></td>
										<td><?= $row['tanggal_pesan']?></td>
										<td><?= $row['tanggal_ambil']?></td>
										<td><?= $row['namaroti']?></td>
										<td><?= $row['jumlah']?></td>
										<td><?= $row['atas_nama']?></td>
										<td class="text-center">
											<a  class="btn btn-simple btn-warning btn-icon table-action edit" 
											rel="tooltip" title="Ubah" href="<?php echo base_url('index.php/c_pemesanan/formUbahPemesanan/'.$row['idpemesanan']); ?>"><i class="fa fa-edit"></i></a>
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

