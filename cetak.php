 <center>
     <h2>Laporan Peminjaman Buku</h2>
 </center>
 <table border="1" cellspacing="0" cellpadding="5" width="100%">
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
        include "koneksi.php";
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
 <script>
window.print();
setTimeout(function() {
    window.close();
}, 100);
 </script>