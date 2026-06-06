<!DOCTYPE html>
<html>
<body>

<form method="POST">
    <input type="text" name="nama">
    <button type="submit">Kirim</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Welcome, " . $_POST["nama"];
}
?>

</body>
</html>