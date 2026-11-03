<?php
$kecamatan = $_POST['kecamatan'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$nama = $_POST['nama'];
$pemilik = $_POST['pemilik'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO olahraga_banyumas (
kecamatan, longitude, latitude, nama, pemilik)
VALUES
('$kecamatan', '$longitude', '$latitude', '$nama', '$pemilik')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.html");
    exit;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>