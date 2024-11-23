<h1 class="mt-4">Buku</h1>
<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <a href="?page=buku_tambah" class="btn btn-primary">+Tambah Data</a>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Judu</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Initialize the variable $i
                $i = 1;

                // Query to fetch categories
                $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori");

                // Loop through the fetched data
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td> <!-- Display and increment $i -->
                    <td><?php echo htmlspecialchars($data['kategori']); ?></td>
                    <td><?php echo htmlspecialchars($data['judul']); ?></td>
                    <td><?php echo htmlspecialchars($data['penulis']); ?></td>
                    <td><?php echo htmlspecialchars($data['penerbit']); ?></td>
                    <td><?php echo htmlspecialchars($data['tahun_terbit']); ?></td>
                    <td><?php echo htmlspecialchars($data['deskripsi']); ?></td>
                    <td>
                        <a href="?page=buku_ubah&id=<?php echo $data['id_buku']; ?>" class="btn btn-info">Ubah</a>
                        <a href="?page=buku_hapus&id=<?php echo $data['id_buku']; ?>" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">Hapus</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>