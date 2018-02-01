<?php if ($_SESSION['idlevel'] == 1) { $this->load->view('kasir/sidebar'); }
elseif ($_SESSION['idlevel'] == 4) { $this->load->view('pimpinan/sidebar'); } ?>

<a class="navbar-brand">Data Pemesanan</a>

<?php $this->load->view('kasir/headbar'); ?>
<!--Grafik Permintaan-->
<div class="content wrapper">
	<div class="container-fluid">
		<div class="row">

			<!-- Tabel jumlah produk -->
			<div class="col-md-12">
				<div class="card">
					<div class="header">Daftar Pemesanan</div>
					<div class="content">
						<div class="toolbar">
                            <?php if ($_SESSION['idlevel'] == 1) {?>
							<a href="<?php echo base_url('index.php/c_pemesanan/formTambahPemesanan'); ?>" class="btn btn-primary" type="button">Tambah Pemesanan</a>
                            <?php } ?>
						</div>
						<br>
						<div class="fresh-datatables">
							<table  id="example1" class="table table-hover table-striped">
								<thead>
									<th>No</th>
									<th>Id Pemesanan</th>
									<th>Tanggal Pemesanan</th>
									<th>Total</th>
									<th>Bayar</th>
									<th>Kembalian</th>
									<th>Tanggal Ambil</th>
									<th>Atas Nama</th>
									<th class="disabled-sorting text-center">Actions</th>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pemesanan as $row){
										?>
										<td><?= $no ?></td>
										<td><?= $row['idpemesanan']?></td>
										<td><?= $row['tanggal_pesan']?></td>
										<td><?= $row['total']?></td>
										<td><?= $row['bayar']?></td>
										<td><?= $row['kembalian']?></td>
										<td><?= $row['tanggal_ambil']?></td>
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
<?php $this->load->view('kasir/footer'); ?>
</html>

