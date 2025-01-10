<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            <i class="fas fa-edit"></i>Input Data Barang
        </div>
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="proses_simpan.php" method="post"
                enctype="multipart/form-data" novalidate>
                    <div class="row">
                        <div class="col">
                            <div class="form-group col-md-12">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" name="id" maxlength="5" autocomplete="off" required>
                                <div class="invalid-feedback">Kode Barang tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama" autocomplete="off" required>
                                <div class="invalid-feedback">Nama Barang tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Jenis Barang</label>
                                <input type="text" class="form-control" name="jenis" autocomplete="off" required>
                                <div class="invalid-feedback">Jenis Barang tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Merk</label>
                                <input type="text" class="form-control" name="merk" autocomplete="off" required>
                                <div class="invalid-feedback">Merk tidak boleh kosong.</div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group col-md-12">
                                <label>Harga</label>
                                <input type="text" class="form-control" name="harga" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
                                <div class="invalid-feedback">Harga tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Tanggal Masuk</label>
                                <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="tanggal_masuk"
                                onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
                                <div class="invalid-feedback">Tanggal Masuk tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" autocomplete="off" required>
                                <div class="invalid-feedback">Deskripsi Barang tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Stok</label>
                                <input type="text" class="form-control" name="stok" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)"
                                    autocomplete="off" required>
                                <div class="invalid-feedback">Stok tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group col-md-12">
                                <label>Foto Barang</label>
                                <input type="file" class="form-control-file mb-3" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off"
                                    required>
                                <div id="imagePreview"><img class="foto-preview" src="foto/Default.jpg"></div>
                                <div class="invalid-feedback">Foto Barang tidak boleh kosong.</div>
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