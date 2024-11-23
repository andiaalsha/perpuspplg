<h1 class="mt-4">Ubah Kategori Buku</h1>
<div class="card">
    <div class="card-header">
        <h5>Ubah Kategori</h5>
    </div>
    <div class="card-body">
        <form method="post">

            <?php
            $id = $_GET['id'];
            if (isset($_POST['submit'])) {
                $kategori = $_POST['kategori'];
                $query = mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori' WHERE id_kategori=$id");

                if ($query) {
                    echo '<script>alert("Data Berhasil Diperbarui."); window.location.href="?page=kategori";</script>';
                } else {
                    echo '<script>alert("Data Gagal Diperbarui: ' . mysqli_error($koneksi) . '");</script>';
                }
            }
           
            $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori=$id");
            $data = mysqli_fetch_array($query);
            ?>

            <div class="row mb-3">
                <label for="kategori" class="col-md-4 col-form-label">Nama Kategori</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['kategori']); ?>"
                        name="kategori" id="kategori" required>
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