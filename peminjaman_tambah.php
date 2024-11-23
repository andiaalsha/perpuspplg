<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-header">
        <h5>Pinjam Buku</h5>
    </div>
    <div class="card-body">
        <form method="post">
            <?php
            $id = isset($_GET['id']) ? $_GET['id'] : null; // Safely get the id
            if (isset($_POST['submit'])) {
                $id_buku = mysqli_real_escape_string($koneksi, $_POST['id_buku']);
                $id_user = mysqli_real_escape_string($koneksi, $_SESSION['user']['id_user']);
                $tanggal_peminjaman = mysqli_real_escape_string($koneksi, $_POST['tanggal_peminjaman']);
                $tanggal_pengembalian = mysqli_real_escape_string($koneksi, $_POST['tanggal_pengembalian']);
                $status_peminjaman = mysqli_real_escape_string($koneksi, $_POST['status_peminjaman']);

                // Validate tanggal_pengembalian > tanggal_peminjaman
                if (strtotime($tanggal_pengembalian) < strtotime($tanggal_peminjaman)) {
                    echo '<script>
                            alert("Tanggal pengembalian harus setelah tanggal peminjaman.");
                          </script>';
                } else {
                    // Insert into database
                    $query = mysqli_query($koneksi, "INSERT INTO peminjaman (id_buku, id_user, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman) VALUES ('$id_buku', '$id_user', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')");

                    if ($query) {
                        echo '<script>
                                alert("Tambah Data Berhasil.");
                                location.href = "?page=peminjaman"; // Redirect after alert
                              </script>';
                    } else {
                        echo '<script>
                                alert("Tambah Data Gagal: ' . mysqli_error($koneksi) . '");
                              </script>';
                    }
                }
            }

            $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
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
                            <?php echo $buku['judul']; ?>
                        </option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">Tanggal Peminjaman</div>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_peminjaman" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">Tanggal Pengembalian</div>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_pengembalian" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">Status Peminjaman</div>
                <div class="col-md-8">
                    <select name="status_peminjaman" class="form-control" required>
                        <option value="dipinjam">Dipinjam</option>
                        <option value="dikembalikan">Dikembalikan</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>