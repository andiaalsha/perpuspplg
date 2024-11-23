<h1 class="mt-4"> Buku</h1>
<div class="card">
    <div class="card-header">
        <h5>Tambah Buku</h5>
    </div>
    <div class="card-body">
        <form method="post">

            <?php
            if (isset($_POST['submit'])) {
                $id_kategori = $_POST['id_kategori']; 
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $penerbit = $_POST['penerbit'];
                $tahun_terbit = $_POST['tahun_terbit']; // Change here
                $deskripsi = $_POST['deskripsi'];

                // Insert the book with the selected category ID
                $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi) VALUES('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");

                if ($query) {
                    echo '<script>
                            alert("Tambah Data Berhasil.");
                            location.href = "?page=buku"; // Redirect after alert
                          </script>';
                } else {
                    echo '<script>
                            alert("Tambah Data Gagal: ' . mysqli_error($koneksi) . '");
                          </script>';
                }
            }
            ?>

            <div class="row mb-3">
                <label for="kategori" class="col-md-4 col-form-label">Kategori</label>
                <div class="col-md-8">
                    <select name="id_kategori" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                        <?php
                        $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($kategori = mysqli_fetch_array($kat)) {
                            ?>
                        <option value="<?php echo $kategori['id_kategori']; ?>">
                            <?php echo $kategori['kategori']; // Display category name ?>
                        </option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div>
                <div class="row mb-3">
                    <div class="col-md-4">Judul</div>
                    <div class="col-md-8"><input type="text" class="form-control" name="judul" required></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Penulis</div>
                    <div class="col-md-8"><input type="text" class="form-control" name="penulis" required></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Penerbit</div>
                    <div class="col-md-8"><input type="text" class="form-control" name="penerbit" required></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Tahun Terbit</div>
                    <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit" required>
                        <!-- Change here -->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Deskripsi</div>
                    <div class="col-md-8"><textarea name="deskripsi" rows="5" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=buku" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
        </form>
    </div>
</div>
``