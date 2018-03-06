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
									<th style="text-align:center">No</th>
									<th style="text-align:center">Id Penjualan</th>
									<th style="text-align:center">Tanggal</th>
									<th style="text-align:center">Jam</th>
									<th style="text-align:center">Total (Rp)</th>
									<th style="text-align:center" class="disabled-sorting text-center">Actions</th>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($penjualan as $row){
										?>
										<td style="text-align:center"><?= $no ?></td>
										<td style="text-align:center"><?= $row['idpenjualan']?></td>
										<td style="text-align:center"><?= $row['tanggal']?></td>
										<td style="text-align:center"><?= $row['jam']?></td>
										<td style="text-align:center"><?= $row['total']?></td>
										<td class="text-center">
											<a href="<?=site_url('c_penjualan/detail/'.$row['idpenjualan'])?>"><b button type="submit" class="btn btn-fill btn-info" class="btn bg-blue waves-effect">Lihat Detail</b>
											</a>
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

