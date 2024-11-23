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
                    // Update data peminjaman
                    $query = mysqli_query($koneksi, "UPDATE peminjaman SET id_buku='$id_buku', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman' WHERE id_peminjaman=$id");

                    if ($query) {
                        echo '<script>
                                alert("Data berhasil diperbarui.");
                                location.href = "?page=peminjaman"; // Redirect setelah sukses
                              </script>';
                    } else {
                        echo '<script>
                                alert("Gagal memperbarui data: ' . mysqli_error($koneksi) . '");
                              </script>';
                    }
                }
            }

            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$id'");
            $data = mysqli_fetch_array($query);
            ?>

            <div class="row mb-3">
                <label for="id_buku" class="col-md-4 col-form-label">Buku</label>
                <div class="col-md-8">
                    <select name="id_buku" class="form-control" required>
                        <option value="">Pilih Buku</option>
                        <?php
                        $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                        while ($buku = mysqli_fetch_array($buk)) {
                            ?>
                        <option value="<?php echo $buku['id_buku']; ?>"
                            <?php if ($buku['id_buku'] == $data['id_buku']) echo 'selected'; ?>>
                            <?php echo $buku['judul']; ?>
                        </option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="tanggal_peminjaman" class="col-md-4 col-form-label">Tanggal Peminjaman</label>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_peminjaman"
                        value="<?php echo $data['tanggal_peminjaman']; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="tanggal_pengembalian" class="col-md-4 col-form-label">Tanggal Pengembalian</label>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_pengembalian"
                        value="<?php echo $data['tanggal_pengembalian']; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="status_peminjaman" class="col-md-4 col-form-label">Status Peminjaman</label>
                <div class="col-md-8">
                    <select name="status_peminjaman" class="form-control" required>
                        <option value="dipinjam"
                            <?php if ($data['status_peminjaman'] == 'dipinjam') echo 'selected'; ?>>Dipinjam</option>
                        <option value="dikembalikan"
                            <?php if ($data['status_peminjaman'] == 'dikembalikan') echo 'selected'; ?>>Dikembalikan
                        </option>
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