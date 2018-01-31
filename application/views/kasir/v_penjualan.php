<?php if ($_SESSION['idlevel'] == 1) { $this->load->view('kasir/sidebar'); }
elseif ($_SESSION['idlevel'] == 4) { $this->load->view('pimpinan/sidebar'); } ?>

<a class="navbar-brand">Data Penjualan</a>

<?php $this->load->view('kasir/headbar'); ?>
<!--Grafik Penjualan-->
<div class="content wrapper">
	<div class="container-fluid">
		<div class="row">

			<!-- Tabel jumlah produk -->
			<div class="col-md-12">
				<div class="card">
					<div class="header">Daftar Penjualan</div>
					<div class="content">
						<?php if ($_SESSION['idlevel'] == 1) { ?>
						<div class="toolbar">
							<a href="<?php echo base_url('index.php/c_penjualan/formTambahPenjualan'); ?>" class="btn btn-primary" type="button">Tambah Penjualan</a>
						</div>
						<?php } ?>
						<br>
						<div class="fresh-datatables">
							<table  id="example1" class="table table-hover table-striped">
								<thead>
									<th>No</th>
									<th>Id Penjualan</th>
									<th>Tanggal</th>
									<th>Jam</th>
									<th>Total</th>
									<th>Bayar</th>
									<th>Kembalian</th>
									<th class="disabled-sorting text-center">Actions</th>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($penjualan as $row){
										?>
										<td><?= $no ?></td>
										<td><?= $row['idpenjualan']?></td>
										<td><?= $row['tanggal']?></td>
										<td><?= $row['jam']?></td>
										<td><?= $row['total']?></td>
										<td><?= $row['bayar']?></td>
										<td><?= $row['kembalian']?></td>
										<td class="text-center">
											<a  class="btn btn-simple btn-warning btn-icon table-action edit" 
											rel="tooltip" title="Ubah" href="<?php echo base_url('index.php/c_penjualan/formUbahPenjualan/'.$row['idpenjualan']); ?>"><i class="fa fa-edit"></i></a>
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
</body>
<?php $this->load->view('kasir/footer'); ?>
</html>

