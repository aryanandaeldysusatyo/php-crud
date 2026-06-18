<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<html lang="en">
<!-- caution -->
<!-- nama branch githubnya " prod " -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>


<body>
    <div class="container py-5">
        <h1 id="judul" class="py-2">Para Client</h1>
        <!-- //perlu diingat kalo "href" harus huruf kecil semua -->


        <Table class="table">
            <thead>
                <!-- /table row V-->
                <tr>
                    <!-- Table Header V -->
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Nomor</th>
                    <th>Dibuat Pada</th>
                    <th>Tindakan</th>
                </tr>
            </thead>

            <!-- Table Column With Data -->
            <tbody>
                <!-- konektivitas ke mysql/phpmyadmin -->
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "listdemo";

                // database :
                // 1. Membuat Koneksi ke Database
                $connection = new mysqli($servername, $username, $password, $database);

                // 2. Mengecek untuk konfirmasi apakah tersambung ato ngga
                //jika koneksinya error
                if ($connection->connect_error) {
                    // maka akan mati dengan menampilkan koneksi gagal
                    die("Koneksi Gagal: " . $connection->connect_error);
                }

                // 3. Baca semua row dari tabel database
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                // 4. jika hasil koneksi nilai database tidak sama / gagal
                if (!$result) {
                    die("Query tidak valid: " . $connection->error);
                }

                //  Membaca data dari satuan baris dari beberapa kolom pada table database, dan menampilkannya di tabel
                while ($row = $result->fetch_assoc()) {
                    // dan di bawah ini buktikan kalau "echo" bisa mengeluarkan kode html dengan php dengan format ( echo "kode html dan php" )
                    echo "  
                <tr>                
                <td>$row[id]</td>
                <td>$row[nama]</td>
                <td>$row[email]</td>
                <td>$row[alamat]</td>
                <td>$row[nomor]</td>
                <td>$row[created_at]</td>
                <td>
                
                
                    <a class='btn btn-primary' href='/WebExample.php/edit.php? id=$row[id]'>Edit</a>
                    <a class='btn btn-danger' href='/WebExample.php/hapus.php? id=$row[id]'>Hapus</a>
                </td>
            </tr>
                ";
                    //                                                                        ^
                    // untuk melakukan edit atau hapus, harus dilakukan berdasarkan id client |
                }

                ?>

            </tbody>
        </Table>
        <a id="tombol-tambah" class='btn btn-primary' href="/webexample/create.php" role="button">Tambah Client</a>
    </div>
</body>

</html>