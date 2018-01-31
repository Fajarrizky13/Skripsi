<?php $this->load->view('pimpinan/sidebar'); ?>

<a class="navbar-brand">Rekap Data Penjualan</a>

<?php $this->load->view('pimpinan/headbar'); ?>
<!--Grafik Penjualan-->
<div class="content wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="header">Tambah Penjualan</div>
						<div class="content">
							<div class="form-group">
								<div class="row">
									<div class="col-md-3 form-group">
										<select name="roti" class="form-control" required>  
											<option selected disabled>- Jenis Roti -</option>    
									<!--<?php foreach ($roti as $item) { ?>
									<option value="<?php echo $item['idroti']; ?>"><?php echo $item['namaroti']; ?></option>
									<?php } ?>-->                  
								</select>
							</div>
							<div class="col-md-3 form-group">
								<input type="number"  name="jumlah" placeholder="masukkan jumlah" class="form-control" required>
							</div>
							<div class="col-md-3 form-group">
								<label></label>
								<button type="submit" value="submit" class="btn btn-fill btn-info">Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Tabel pejualan -->
	<div class="col-md-12">
		<div class="card">
			<div class="header">Daftar Pejualan</div>
			<div class="content">
				<div class="toolbar">
				</div>
				<br>
				<div class="fresh-datatables">
					<table  id="example1" class="table table-hover table-striped">
						<thead>
							<th>No</th>
							<th>ID Penjualan</th>
							<th>Tanggal Penjualan</th>
							<th class="disabled-sorting text-center">Actions</th>
						</thead>
						<tbody>

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
</body>
<?php $this->load->view('kasir/footer'); ?>
</html>

