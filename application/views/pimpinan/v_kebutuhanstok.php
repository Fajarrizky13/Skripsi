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
                                    <form method="post" action="<?= site_url(); ?>/c_bahanbaku/peramalanbulanan">
                                        <div class="form-group">
                                            <label>Pilih Periode (Bulan)</label>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <select name="bulan" class="form-control">
                                                        <option value="1">Januari</option>
                                                        <option value="2">Februari</option>
                                                        <option value="3">Maret</option>
                                                        <option value="4">April</option>
                                                        <option value="5">Mei</option>
                                                        <option value="6">Juni</option>
                                                        <option value="7">Juli</option>
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="submit" value="Tampilkan"
                                                    class="btn btn-fill btn-success">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br>
                                <div class="fresh-datatables">
                                    <table id="example2" class="table table-hover table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Jenis Roti</th>
                                            <th>Penjualan aktual</th>
                                            <th>Peramalan Penjualan</th>
                                            <th>Pemesanan</th>
                                            <th>Safety Stock</th>
                                            <th class="disabled-sorting text-center">Actions</th>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($data["ramal"])) {
                                                $no = 0;
                                                foreach ($data["bulan1"] as $ramal) {
                                                    $no++; ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $ramal["namaroti"]; ?></td>
                                                        <td><?php echo $ramal["totalbulanan"]; ?></td>
                                                        <td><?php echo $data["ramal"][$no-1]; ?></td>
                                                        <!-- <td><?php echo $data["pesanan"][$no-1]; ?></td>
                                                        <td><?php echo $data["safety"][$no-1]; ?></td>
                                                        <td class='text-center'> -->
                                                            <!-- <a href="<?php echo base_url(); ?>index.php/c_bahanbaku/kebutuhanbahan?id=<?php echo $ramal["id_roti"]?>&tanggal=<?php echo $ramal["bulan"]?>"> -->
                                                            <!-- <a >
                                                                <button type="submit" class="btn btn-fill btn-info open-modal" data-toggle="modal" data-target="#myModal" 
                                                                data-bulan="<?php echo $ramal["bulan"]; ?>"
                                                                data-total="<?php echo $ramal["total"]; ?>"
                                                                data-ramal="<?php echo $data["ramal"][$no-1]; ?>"
                                                                data-pesanan="<?php echo $data["pesanan"][$no-1]; ?>">
                                                                Lihat Bahan Baku
                                                            </button>
                                                        </a>
                                                    </td> -->
                                                </tr>
                                                <?php }
                                            } else { ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class='text-center'>
                                                </td>
                                            </tr>
                                            <?php } ?>
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
<?php $this->load->view('pimpinan/footer'); ?>

</body>



</html>

