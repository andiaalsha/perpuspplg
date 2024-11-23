<h1 class="mt-4">Peminjaman Buku</h1>
<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <a href="?page=peminjaman_tambah" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Peminjaman
            </a>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Initialize the variable $i
                $i = 1;

                // Query to fetch data
                $query = mysqli_query($koneksi, "SELECT peminjaman.*, user.nama, buku.judul 
                FROM peminjaman 
                LEFT JOIN user ON user.id_user = peminjaman.id_user 
                LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku 
                WHERE peminjaman.id_user = " . $_SESSION['user']['id_user']);

                // Loop through the fetched data
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td> <!-- Display and increment $i -->
                    <td><?php echo htmlspecialchars($data['nama']); ?></td>
                    <td><?php echo htmlspecialchars($data['judul']); ?></td>
                    <td><?php echo htmlspecialchars($data['tanggal_peminjaman']); ?></td>
                    <td><?php echo htmlspecialchars($data['tanggal_pengembalian']); ?></td>
                    <td><?php echo htmlspecialchars(!empty($data['status_peminjaman']) ? $data['status_peminjaman'] : 'Belum Dikembalikan'); ?>
                    </td>
                    <td>
                        <a href="?page=peminjaman_ubah&id=<?php echo $data['id_peminjaman']; ?>"
                            class="btn btn-info">Ubah</a>
                        <a href="?page=peminjaman_hapus&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>