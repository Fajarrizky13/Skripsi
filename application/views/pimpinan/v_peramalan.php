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
                                    <form method="post" action="<?= site_url(); ?>/c_peramalan/peramalanRoti">
                                        <div class="form-group">
                                            <label for="idroti">Pilih Roti</label>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <select name="idroti" class="form-control">
                                                        <?php foreach ($data["roti"] as $rot) { ?>
                                                            <option value="<?php echo $rot["idroti"]; ?>"><?php echo $rot["namaroti"]; ?></option>
                                                        <?php } ?>
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
                                        <th>Periode</th>
                                        <th>Penjualan aktual</th>
                                        <th>Peramalan Penjualan</th>
                                        <th>Pemesanan</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($data["peramalan"])) {
                                            $no = 0;
                                            foreach ($data["peramalan"] as $ramal) {
                                                $no++; ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $ramal["bulan"]; ?></td>
                                                    <td><?php echo $ramal["total"]; ?></td>
                                                    <td><?php echo $data["ramal"][$no-1]; ?></td>
                                                    <td><?php echo $data["pesanan"][$no-1]; ?></td>
                                                    <td class='text-center'>
                                                        <a href="<?php echo base_url(); ?>index.php/c_bahanbaku/kebutuhanbahan?id=<?php echo $ramal["id_roti"]?>&tanggal=<?php echo $ramal["bulan"]?>">
                                                            <button type="submit" class="btn btn-fill btn-info">Lihat
                                                                Bahan
                                                                Baku
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class='text-center'>
                                                    <a href="<?php echo base_url(); ?>index.php/c_bahanbaku/kebutuhanbahan">
                                                        <button type="submit" class="btn btn-fill btn-info">Lihat Bahan
                                                            Baku
                                                        </button>
                                                    </a>
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


</div>
<?php $this->load->view('pimpinan/footer'); ?>

</body>


</html>

