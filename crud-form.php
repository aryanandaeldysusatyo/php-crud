<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="cont-1">
        <h2>Para Client</h2>
        <a class="primary-btn" href="/WebExample/index.php" role="button">Tambah Client</a>
    </div>
    <Table>
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
        <tbody>
            <!-- konektivitas ke mysql/phpmyadmin -->
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "listdemo";

            // database":
            // 1. Membuat Koneksi ke Database
            $connection = new mysqli($servername, $username, $password, $database);

            // Mengecek untuk konfirmasi apakah tersambung ato ngga
            //jika koneksinya error
            if ($connection->connect_error) {
                // maka akan mati dengan menampilkan koneksi gagal
                die("Koneksi Gagal: " . $connection->connect_error);
            }
            // Baca semua row dari tabel database
            $sql = "SELECT * FROM clients";
            $result = $connection->query($sql);

            // jika hasil koneksi nilai database tidak sama / gagal
            if (!$result) {
                die("Query tidak valid: " . $connection->error);
            }
            // membaca data dari satuan masing2 row table database
            while ($row = $result->fetch_assoc()) {
                // di bawah ini buktikan kalau "echo" bisa mengeluarkan kode html dengan php dengan format ( echo "kode html dan php" )
                echo "  
                <tr>                
                <td>$row[id]</td>
                <td>$row[nama]</td>
                <td>$row[email]</td>
                <td>$row[alamat]</td>
                <td>$row[nomor]</td>
                <td>$row[created_at]</td>
                <td>
                
                    <a class='edit' href='/WebExample.php/edit.php'>Edit</a>
                    <a class='hapus' href='/WebExample.php/hapus.php'>Hapus</a>
                </td>
            </tr>
                ";
            }

            ?>

        </tbody>
    </Table>
</body>

</html>