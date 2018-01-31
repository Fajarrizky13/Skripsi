<?php $this->load->view('kasir/sidebar'); ?>

<a class="navbar-brand">Data Pemesanan</a>

<?php $this->load->view('kasir/headbar'); ?>
<!--Grafik Permintaan-->
<div class="content wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<form action="<?php echo base_url('index.php/c_pemesanan/ubahPemesanan/'.$detail['idpemesanan']) ?>" method="post" enctype="multipart/form-data">
						<div class="header">Ubah Pemesanan</div>
						<div class="content">
							<div class="form-group">
								<label>Tanggal Pengambilan</label>
								<input type="date"  name="tanggal_ambil" value="<?php echo $detail['tanggal_ambil']; ?>" placeholder="masukkan tanggal pengambilan" class="form-control" required>
							</div>
							<div class="form-group">
								<select name="roti" class="form-control" required>  
									<?php foreach ($roti as $item) { ?>
									<option value="<?php echo $item['idroti']; ?>" <?php echo ($detail['namaroti'] == $item['idroti']) ? "selected":""; ?>><?php echo $item['namaroti']; ?></option>
									<?php } ?>                      
								</select>
							</div>
							<div class="form-group">
								<label>Jumlah</label>
								<input type="number"  name="jumlah" value="<?php echo $detail['jumlah']; ?>" placeholder="masukkan jumlah" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Atas Nama</label>
								<input type="text"  name="atas_nama" value="<?php echo $detail['atas_nama']; ?>" placeholder="masukkan nama" class="form-control" required>
							</div>
							<div class="form-group">
								<label></label>
								<button type="submit" value="update" class="btn btn-fill btn-info">Ubah</button>
								<a href="<?php echo base_url('index.php/c_pemesanan/pemesanan'); ?>" class="btn btn-danger btn-fill ">Kembali</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- Data Pemesanan end-->
		</div>
	</div>
</body>
<?php $this->load->view('kasir/footer'); ?>
</html>

