<?php $this->load->view('pimpinan/sidebar'); ?>
<a class="navbar-brand">Kebutuhan</a>
<?php $this->load->view('pimpinan/headbar'); ?>

<!--Grafik Permintaan-->
<div class="content wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">Keutuhan Periode XXXXX</div>
					<div class="content">
						<div class="toolbar">
						</div>
						<br>
						<div class="fresh-datatables">
							<table class="new table table-hover table-striped">
								<thead>
									<tr>
										<th rowspan="2">Jenis</th>
										<th rowspan="2">Jumlah</th>
										<th colspan="5">Kebutuhan</th>
									</tr>
									<tr>
										<th>Terigu</th>
										<th>Telur</th>
										<th>Mentega</th>
										<th>Ragi</th>
										<th>Gula</th>
									</tr>
								</thead>
								<tbody class="text-center">
									<tr>
										<td><?php echo $data["roti"]["namaroti"]?></td>
										<td><?php echo $data["kebutuhan"][0]["total"]?></td>
										<td><?= $data["kebutuhan"][0]["total"]*$data["resep"][0]['jumlah']?></td>
										<td><?= $data["kebutuhan"][0]["total"]*$data["resep"][1]['jumlah']?></td>
										<td><?= $data["kebutuhan"][0]["total"]*$data["resep"][2]['jumlah']?></td>
										<td><?= $data["kebutuhan"][0]["total"]*$data["resep"][3]['jumlah']?></td>
										<td><?= $data["kebutuhan"][0]["total"]*$data["resep"][4]['jumlah']?></td>
									</tr>
<!--									<tr>-->
<!--										<td colspan="2"><b>Total</b></td>-->
<!--										<td>--><?//= (100*$resep1[0]['jumlah'])+(100*$resep2[0]['jumlah'])+(100*$resep3[0]['jumlah'])?><!--</td>-->
<!--										<td>--><?//= (100*$resep1[1]['jumlah'])+(100*$resep2[1]['jumlah'])+(100*$resep3[1]['jumlah'])?><!--</td>-->
<!--										<td>--><?//= (100*$resep1[2]['jumlah'])+(100*$resep2[2]['jumlah'])+(100*$resep2[2]['jumlah'])?><!--</td>-->
<!--										<td>--><?//= (100*$resep1[3]['jumlah'])+(100*$resep2[3]['jumlah'])+(100*$resep3[3]['jumlah'])?><!--</td>-->
<!--										<td>--><?//= (100*$resep1[4]['jumlah'])+(100*$resep2[4]['jumlah'])+(100*$resep3[4]['jumlah'])?><!--</td>-->
<!--										</tr>-->
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
<!--Grafik Permintaan end-->



</div>
</div>
<?php $this->load->view('pimpinan/footer'); ?>

</body>



</html>

