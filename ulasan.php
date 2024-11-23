<h1 class="mt-4">Ulasan Buku</h1>
<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <a href="?page=ulasan_tambah" class="btn btn-primary">+Tambah Data</a>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Ulasan</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Initialize the variable $i
                $i = 1;

                // Query to fetch categories
                $query = mysqli_query($koneksi, "SELECT * FROM ulasan LEFT JOIN user on user.id_user = ulasan.id_user LEFT JOIN buku on buku.id_buku = ulasan.id_buku");

                // Loop through the fetched data
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td> <!-- Display and increment $i -->
                    <td><?php echo htmlspecialchars($data['nama']); ?></td>
                    <td><?php echo htmlspecialchars($data['judul']); ?></td>
                    <td><?php echo htmlspecialchars($data['ulasan']); ?></td>
                    <td><?php echo htmlspecialchars($data['rating']); ?></td>
                    <td>
                        <a href="?page=ulasan_ubah&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-info">Ubah</a>
                        <a href="?page=ulasan_hapus&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');">Hapus</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>