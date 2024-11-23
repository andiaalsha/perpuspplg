<?php
include "koneksi.php";

// Start the session only if it hasn't been started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    $password = md5($_POST['password']); 

    // Correctly insert the user data into the database
    $insert = mysqli_query($koneksi, "INSERT INTO user(nama, email, alamat, no_telepon, username, password, level) VALUES ('$nama', '$email', '$alamat', '$no_telepon', '$username', '$password', '$level')");

    if ($insert) {
        echo '<script>alert("Selamat, Register Berhasil Silahkan Login."); location.href="login.php";</script>';
    } else {
        echo '<script>alert("Register Gagal, Silahkan Ulangi Kembali.")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Perpustakaan Digital</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Register Perpustakaan Digital</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="nama"
                                                placeholder="Masukkan Nama Lengkap" required />
                                            <label class="small mb-1">Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="email" name="email"
                                                placeholder="Masukkan email" required />
                                            <label class="small mb-1">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="no_telepon"
                                                placeholder="Masukkan No. Telepon" required />
                                            <label class="small mb-1">No. Telepon</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea name="alamat" rows="5" class="form-control" required></textarea>
                                            <label class="small mb-1">Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="username"
                                                placeholder="Masukkan Username" required />
                                            <label class="small mb-1">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="password"
                                                type="password" placeholder="Masukkan Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select name="level" class="form-select">
                                                <option value=" peminjam">Peminjam</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                            <label class="small mb-1">Level</label>
                                        </div>

                                        <div class=" d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="register"
                                                value="register">Register</button>
                                            <a class="btn btn-danger" href="login.php">Login</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        &copy; 2024 Perpustakaan Digital.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap