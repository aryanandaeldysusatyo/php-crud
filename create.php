<?php
$nama = "";
$email = "";
$alamat = "";
$nomor = "";
$errorMessage = "";
$succesfullyAdded = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];
    $nomor = $_POST["nomor"];


    do {
        // jika nama,email, alamat dan nomor kosong, keluarkan teks "semua form harus diisi"
        if (empty($nama) || empty($email) || empty($alamat) || empty($nomor)) {
            $errorMessage = "semua form harus diisi";
            break;
        }

        // untuk menambahkan client baru
        $nama = "";
        $email = "";
        $alamat = "";
        $nomor = "";

        $succesfullyAdded = "client berhasil ditambahkan";
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style-create.css">
    <title>Main Page</title>
</head>

<body>
    <div class="container py-5">
        <h1 id="adding-title">Add Client</h1>


        <!-- jika klien berhasil ditambahkan -->
        <?php
        if (!empty($errorMessage)) {
            echo "
    <div class='alert alert-warning alert-dismissible fade show' role = 'alert'>
    <strong>$errorMessage</strong>
    <button type= 'button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>    
    ";
        }
        ?>

        <!-- form untuk isi Data -->
        <form method="post">

            <!-- Form input field untuk nama  -->
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div>
                    <input type="text" class="form-control" name="nama" value="<?php echo $nama ?>">
                </div>
            </div>

            <!-- Form input field untuk email -->
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Email</label>
                <div>
                    <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
                </div>
            </div>

            <!-- Form input field untuk Alamat -->
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Alamat</label>
                <div>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $alamat ?>">
                </div>
            </div>

            <!-- Form input field untuk Nomor Telp -->
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">No Telephone</label>
                <div>
                    <input type="text" class="form-control" name="nomor" value="<?php echo $nomor ?>">
                </div>
            </div>

            <?php
            if (!empty($succesfullyAdded)) {
                echo "
                <div class= 'row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$succesfullyAdded</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                </div>
                </div>
                ";
            }
            ?>


            <!-- tombol menyimpan data -->
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" style="background-color: #008000;">submit</button>
                </div>



                <!-- tombol batal (ke halaman awal) -->
                <div class="col-sm-3 d-grid">
                    <!-- mengirimkan balik ke halaman awal -->
                    <a class="btn btn-outline-primary" href="/webexample/crud-form.php" role="button">Batal</a>
                </div>
            </div>
        </form>

    </div>

</body>

</html>