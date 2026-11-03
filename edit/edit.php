<?php
$id              = $_POST['id'];
$kecamatan       = $_POST['kecamatan'];
$longitude       = $_POST['longitude'];
$latitude        = $_POST['latitude'];
$luas            = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "latihan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE tabel_penduduk SET
        Kecamatan='$kecamatan',
        Longitude='$longitude',
        Latitude='$latitude',
        Luas='$luas',
        Jumlah_Penduduk='$jumlah_penduduk'
        WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: ../index.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>