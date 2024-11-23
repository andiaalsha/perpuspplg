<h1 class="mt-4">Laporan Peminjaman Buku</h1>
<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <a href="cetak.php" target="_blank" class="btn btn-primary">
                <i class="fa fa-print"></i> Cetak Data
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
                </tr>
            </thead>
            <tbody>
                <?php
                // Initialize the variable $i
                $i = 1;

                // Query to fetch data from peminjaman, user, and buku
                $query = mysqli_query($koneksi, "
                    SELECT peminjaman.*, user.nama, buku.judul 
                    FROM peminjaman 
                    LEFT JOIN user ON user.id_user = peminjaman.id_user 
                    LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku
                ");

                // Loop through the fetched data
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td> <!-- Display and increment $i -->
                    <td><?php echo htmlspecialchars($data['nama']); ?></td>
                    <td><?php echo htmlspecialchars($data['judul']); ?></td>
                    <td><?php echo htmlspecialchars($data['tanggal_peminjaman']); ?></td>
                    <td><?php echo htmlspecialchars($data['tanggal_pengembalian']); ?></td>
                    <td><?php echo htmlspecialchars($data['Status_peminjaman']); ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>