<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-header">
        <h5>Beri Ulasan</h5>
    </div>
    <div class="card-body">
        <form method="post">

            <?php
            $id = isset($_GET['id']) ? $_GET['id'] : null; // Safely get the id
            if (isset($_POST['submit'])) {
                $id_buku = $_POST['id_buku'];
                $id_user = $_SESSION['user']['id_user'];  
                $ulasan = $_POST['ulasan'];
                $rating = $_POST['rating'];

                // Insert the review into the database
                $query = mysqli_query($koneksi, "INSERT INTO ulasan(id_buku, id_user, ulasan, rating) VALUES('$id_buku', '$id_user', '$ulasan', '$rating')");

                if ($query) {
                    echo '<script>
                            alert("Tambah Data Berhasil.");
                            location.href = "?page=ulasan"; // Redirect after alert
                          </script>';
                } else {
                    echo '<script>
                            alert("Tambah Data Gagal: ' . mysqli_error($koneksi) . '");
                          </script>';
                }
            }

            // Correct the SQL query to select from ulasan
            $query = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_ulasan='$id'");
            $data = mysqli_fetch_array($query);
            ?>

            <div class="row mb-3">
                <label for="kategori" class="col-md-4 col-form-label">Buku</label>
                <div class="col-md-8">
                    <select name="id_buku" class="form-control" required>
                        <option value="">Pilih Buku</option>
                        <?php
                        $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                        while ($buku = mysqli_fetch_array($buk)) {
                            ?>
                        <option value="<?php echo $buku['id_buku']; ?>">
                            <?php echo $buku['judul']; // Display book title ?>
                        </option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div>
                <div class="row mb-3">
                    <div class="col-md-4">Ulasan</div>
                    <div class="col-md-8"><textarea name="ulasan" rows="5" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="rating" class="col-md-2 col-form-label">Rating</label>
                    <div class="col-md-10">
                        <select name="rating" id="rating" class="form-select" required>
                            <option value="" disabled selected>Pilih Rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=ulasan" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
        </form>
    </div>
</div>