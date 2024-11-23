<h1 class="mt-4"> Buku</h1>
<div class="card">
    <div class="card-header">
        <h5>Ubah Buku</h5>
    </div>
    <div class="card-body">
        <form method="post">

            <?php
            $id = $_GET['id'];
            if (isset($_POST['submit'])) {
                $id_kategori = $_POST['id_kategori']; 
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $penerbit = $_POST['penerbit'];
                $tahun_terbit = $_POST['tahun_terbit'];
                $deskripsi = $_POST['deskripsi'];

                // Update the book with the selected category ID
                $query = mysqli_query($koneksi, "UPDATE buku SET id_kategori='$id_kategori', judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi' WHERE id_buku='$id'");

                if ($query) {
                    echo '<script>
                            alert("Ubah Data Berhasil.");
                            location.href = "?page=buku"; // Redirect after alert
                          </script>';
                } else {
                    echo '<script>
                            alert("Ubah Data Gagal: ' . mysqli_error($koneksi) . '");
                          </script>';
                }
            }

            // Fetch the current book data
            $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
            $data = mysqli_fetch_array($query);
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
                        <option value="<?php echo $kategori['id_kategori']; ?>"
                            <?php if ($kategori['id_kategori'] == $data['id_kategori']) echo 'selected'; ?>>
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
                    <div class="col-md-8"><input type="text" value="<?php echo htmlspecialchars($data['judul']); ?>"
                            class="form-control" name="judul" required></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Penulis</div>
                    <div class="col-md-8"><input type="text" value="<?php echo htmlspecialchars($data['penulis']); ?>"
                            class="form-control" name="penulis" required></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Penerbit</div>
                    <div class="col-md-8"><input type="text" value="<?php echo htmlspecialchars($data['penerbit']); ?>"
                            class="form-control" name="penerbit" required></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Tahun Terbit</div>
                    <div class="col-md-8"><input type="number"
                            value="<?php echo htmlspecialchars($data['tahun_terbit']); ?>" class="form-control"
                            name="tahun_terbit" required></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">Deskripsi</div>
                    <div class="col-md-8">
                        <textarea name="deskripsi" rows="5" class="form-control"
                            required><?php echo htmlspecialchars($data['deskripsi']); ?></textarea>
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