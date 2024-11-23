<h1 class="mt-4">Kategori Buku</h1>
<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <a href="?page=kategori_tambah" class="btn btn-primary">+Tambah Data</a>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Initialize the variable $i
                $i = 1;

                // Query to fetch categories
                $query = mysqli_query($koneksi, "SELECT * FROM kategori");

                // Loop through the fetched data
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td> <!-- Display and increment $i -->
                    <td><?php echo htmlspecialchars($data['kategori']); ?></td> <!-- Display category safely -->
                    <td>
                        <a href="?page=kategori_ubah&id=<?php echo $data['id_kategori']; ?>"
                            class="btn btn-info">Ubah</a>
                        <a href="?page=kategori_hapus&id=<?php echo $data['id_kategori']; ?>" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">Hapus</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>