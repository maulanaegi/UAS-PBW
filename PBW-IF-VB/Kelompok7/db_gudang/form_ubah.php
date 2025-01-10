<?php

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $query = mysqli_query($db, "SELECT * FROM tbl_barang WHERE id='$id'")
                                    or die('Query Error! : '.mysqli_error($db));
        $data = mysqli_fetch_assoc($query);

        $id             = $data['id'];
        $nama           = $data['nama'];
        $jenis          = $data['jenis'];
        $merk           = $data['merk'];
        $harga          = $data['harga'];
        $tanggal_masuk  = date('Y-m-d', strtotime($data['tgl_masuk']));
        $deskripsi      = $data['deskripsi'];
        $stok           = $data['stok'];
        $foto           = $data['foto'];
    }

    mysqli_close($db);
?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            <i class="fas fa-edit"></i> Ubah Data Stok Barang
        </div>

        <div class="card">
            <div class="card-body">

                <form class="needs-validation" action="proses_ubah.php" method="post"
                enctype="multipart/form-data" novalidate>
                    <div class="row">
                        <div class="col">
                            <div class="form-group col-md-12">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" name="id" maxlength="5" autocomplete="off"
                                value="<?php echo $id; ?>" readonly required>
                                <div class="invalid-feedback">Kode Barang tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama" autocomplete="off"
                                value="<?php echo $nama; ?>" required>
                                <div class="invalid-feedback">Nama Barang tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Jenis Barang</label>
                                <input type="text" class="form-control" name="jenis" autocomplete="off"
                                value="<?php echo $jenis; ?>" required>
                                <div class="invalid-feedback">Jenis Barang tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Merk</label>
                                <input type="text" class="form-control" name="merk" autocomplete="off"
                                value="<?php echo $merk; ?>" required>
                                <div class="invalid-feedback">Merk tidak boleh kosong.</div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group col-md-12">
                                <label>Harga</label>
                                <input type="text" class="form-control" name="harga" autocomplete="off"
                                value="<?php echo $harga; ?>" required>
                                <div class="invalid-feedback">Harga tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Tanggal Lahir</label>
                                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_masuk"
                                onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" value="<?php echo $tanggal_masuk; ?>" required>
                                <div class="invalid-feedback">Tanggal Masuk tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" autocomplete="off" value="<?php echo $deskripsi; ?>" required>
                                <div class="invalid-feedback">Deskripsi tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Stok</label>
                                <input type="text" class="form-control" name="stok" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)"
                                    autocomplete="off" value="<?php echo $stok; ?>" required>
                                <div class="invalid-feedback">Stok tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group col-md-12">
                                <label>Foto Barang</label>
                                <input type="file" class="form-control-file mb-3" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off"
                                value="<?php echo $foto; ?>">
                                <div id="imagePreview"><img class="foto-preview" src="foto/<?php echo $foto; ?>"></div>
                            </div>
                        </div>
                    </div>

                    <div class="my-md-4 pt-md-1 border-top"></div>

                    <div class="form-group col-md-12 right">
                        <Input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                        <a href="halaman_admin.php" class="btn btn-secondary btn-reset"> Batal </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>