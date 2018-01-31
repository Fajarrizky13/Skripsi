<!DOCTYPE html>

<html lang="en">
<head>
	<!-- Latest compiled and minified CSS -->
	<!-- 	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/CV.css"> -->
	<!-- Latest compiled and minified JavaScript -->
</head>

<style type="text/css">

body{
	font-family: "Times New Roman", Georgia, Serif;
	padding-left:70px;  padding-right:40px;  padding-top: 5px ; padding-bottom: 4px; 
}


table{
	border-collapse: collapse; 
	font-family: "Times New Roman", Georgia, Serif;
	width: 100%;
}

table.isi{
	font-size: 12px;
}

tr{
	border:5px solid;
	border-style:solid;
	border-top: thick;
	border-left: none;
	border-right: none;
}

td{
	font-family: "Times New Roman", Georgia, Serif;
}
td.center{
	text-align: center;

}

td.left{
	text-align: left;	
}

</style>

<body>
	<body>

		<table class="isi">
			<tr>
				<td class="center" rowspan="5" width="50px"><img style="width:180px; height:120px;" src="img/logo.jpg"></td>
			</tr>
			<tr>
				<td  class="center" style="font-size:24px; font-weight:bold">Rumah Makan LEGIAN JEMBER</td>
			</tr>
			<tr>
				<td class="center" style="font-size:17px; font-weight:bold ;">Jalan Gajah Mada No 234 Kaliwates Jember</td>
			</tr>
			<tr>
				<td class="center" style="font-size:14px">https://www.instagram.com/restolegianjember/</td>
			</tr>	
		</table>
		<br><br>
		<br>
		<table border="0">
			<?php foreach ($isi as $row){?>
			<thead>
				<tr>
					<td style="text-align:left; width:100px;">No Penjualan</td>
					<td style="width:10px;">:</td>
					<td style="text-align:left;"><?php echo $row['idpenjualan'] ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="text-align:left; width:100px;">Tanggal</td>
					<td style="width:10px;">:</td>
					<td style="text-align:left;"><?php echo $row['tanggal_jual'] ?></td>
				</tr>
			</tbody> 
			<?php }?>
		</table>

		<table border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Menu</th>                           
					<th style='text-align:center'>Jumlah</th>
					<th style='text-align:center'>Harga</th>
					<th style='text-align:center'>Subtotal</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no=1;
			$total=0;
			$total_harga=0;

			foreach ($isi as $i) {
				?>
				<tr padding-top="10px">
					<td> <?php echo $no ?> </td>
					<td><?php echo $i['namaroti'] ?></td>
					<td><?php echo $i['jumlah'] ?></td>
					<td><?php echo $i['harga'] ?></td>
					<?php 
					$jml=$i['jumlah'];
					$harga=$i['harga'];
					$index=0;
					$hasil=$jml*$harga;
					?>
					<td><?php echo $hasil ?></td>
					<?php 
					$no++;
					$index++;
					$total_harga=$total_harga+$hasil;
					?>
				</tr>
				<?php
			}

			?>
			<tr>
				<td  colspan="4"><b>Total</b></td>
				<td><?php echo $total_harga ?></td>
			</tr>

			<tr>
				<td  colspan="4"><b>Bayar</b></td>
				<td><?php echo $i['bayar'] ?></td>
			</tr>
			<tr>
				<td  colspan="4"><b>Kembalian</b></td>
				<td><?php echo $i['kembalian'] ?></td>
			</tr>
			</tbody>
		</table>

		<br><br><br><br><br>
		<table >
			<tr>
				<td style="width:380px;"> </td>   
				<td style="width:300px;">Jember, <br> Tanggal <?php echo date("Y/m/d")?> </td>
			</tr>
		</table>
	</body>
</body>
</html>