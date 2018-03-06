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
					<div class="header">Detail Pemesanan</div>
					<div class="content">
						<br>
						<div class="fresh-datatables">
							<table style="border:0px">
                                <tr>
                                    <td style="width:120px;">ID Pemesanan</td>
                                    <td style="width:20px;text-align:center">:</td>
                                    <?php foreach ($pemesan as $row){?>
                                    <td><?=$row['idpemesanan']?></td>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <td style="width:120px;">Atas Nama</td>
                                    <td style="width:20px;text-align:center">:</td>
                                    <?php foreach ($pemesan as $row){?>
                                    <td><?=$row['atas_nama']?></td>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <td style="width:120px;">Tanggal Pesan</td>
                                    <td style="width:20px;text-align:center">:</td>
                                    <?php foreach ($pemesan as $row){?>
                                    <td><?=$row['tanggalpesan']?></td>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <td style="width:120px;">Tanggal Ambil</td>
                                    <td style="width:20px;text-align:center">:</td>
                                    <?php foreach ($pemesan as $row){?>
                                    <td><?=$row['tanggalambil']?></td>
                                    <?php }?>
                                </tr>
                            </table> 
                            <br>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Roti</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $hasil=0;
                                    ?>
                                    <?php $i=1 ?>
                                    <?php foreach ($detail as $row){?>
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td><?=$row['namaroti']?></td>
                                        <td><?=$row['jumlah']?></td>
                                        <td><?=$row['harga']?></td>
                                        <?php 
                                        $jml=$row['jumlah'];
                                        $harga=$row['harga'];
                                        $index=0;
                                        $hasil=$jml*$harga;
                                        ?>
                                        <td><?php echo $hasil ?></td>
                                    </tr>
                                    <?php }?>
                                    <tr>
                                        <td  colspan="4"><b>Total</b></td>
                                        <?php foreach ($pemesan as $row){?>
                                    	<td><?=$row['total']?></td>
                                    	<?php }?>
                                    </tr>

                                    <tr>
                                        <td  colspan="4"><b>Bayar</b></td>
                                        <?php foreach ($pemesan as $row){?>
                                    	<td><?=$row['bayar']?></td>
                                    	<?php }?>
                                    </tr>
                                    <tr>
                                        <td  colspan="4"><b>Kembalian</b></td>
                                        <?php foreach ($pemesan as $row){?>
                                    	<td><?=$row['kembalian']?></td>
                                    	<?php }?>
                                    </tr>
                                </tbody>
                            </table>
							<br>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="button-demo" style="text-align:right;">
                                <a href="<?php echo site_url()?>/c_pemesanan/pemesanan"><button type="button" class="btn bg-red waves-effect">Kembali</button></a>
                            </div>  
                        </div>
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

