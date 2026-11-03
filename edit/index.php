<!DOCTYPE html>
<html>
<body>

<h2>Form Edit</h2>

<?php
// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM olahraga_banyumas WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form action='edit.php' onsubmit='return validateForm()' method='post'>";

    while ($row = $result->fetch_assoc()) {
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'><br>";

        echo "<label for='kec'>Kecamatan:</label><br>";
        echo "<input type='text' id='kec' name='kecamatan' value='" . $row['kecamatan'] . "'><br>";

        echo "<label for='long'>Longitude:</label><br>";
        echo "<input type='text' id='long' name='longitude' value='" . $row['longitude'] . "'><br>";

        echo "<label for='lat'>Latitude:</label><br>";
        echo "<input type='text' id='lat' name='latitude' value='" . $row['latitude'] . "'><br>";

        echo "<label for='nama'>nama:</label><br>";
        echo "<input type='text' id='nama' name='nama' value='" . $row['nama'] . "'><br>";

        echo "<label for='pemilik'>pemilik:</label><br>";
        echo "<input type='text' id='pemilik' name='pemilik' value='" . $row['pemilik'] . "'><br><br>";
    }

    echo "<input type='submit' value='Submit'>";
    echo "</form>";
}
?>

<p id="informasi"></p>

<script>
function validateForm() {
    let luas = document.getElementById("luas").value;
    let text = "";

    if (isNaN(luas) || luas < 1) {
        text = "Data luas harus angka dan tidak boleh bernilai negatif";
        event.preventDefault();
    }

    document.getElementById("informasi").innerHTML = text;
}
</script>

</body>
</html>