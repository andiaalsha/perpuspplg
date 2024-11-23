<h1 class="mt-4">Kategori Buku</h1>
<div class="card">
    <div class="card-header">
        <h5>Tambah Kategori</h5>
    </div>
    <div class="card-body">
        <form method="post">

            <?php
            if (isset($_POST['submit'])) {
                $kategori = $_POST['kategori'];
                $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) VALUES('$kategori')");

                if ($query) {
                    echo '<script>
                            alert("Tambah Data Berhasil.");
                            location.href = "?page=kategori"; // Redirect after alert
                          </script>';
                } else {
                    echo '<script>
                            alert("Tambah Data Gagal: ' . mysqli_error($koneksi) . '");
                          </script>';
                }
            }
            ?>

            <div class="row mb-3">
                <label for="kategori" class="col-md-4 col-form-label">Nama Kategori</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="kategori" id="kategori" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div> <!-- Empty column for alignment -->
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>