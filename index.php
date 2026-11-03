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
$sql = "SELECT * FROM olahraga_banyumas";
$result = $conn->query($sql);
echo "<a href='input/index.html'><button type='button'>Input</button></a><br><br>";
if ($result->num_rows > 0) {
    echo "<table border='2px'><>
<th>Kecamatan</th>
<th>Longitude</th>
<th>Latitude</th>
<th>Nama</th>
<th>Pemilik</th>
<th>Aksi</th>
<th colspan='2'>Aksi</th>";

    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["kecamatan"] . "</td>" .
            "<td>" . $row["longitude"] . "</td>" .
            "<td>" . $row["latitude"] . "</td>" .
            "<td>" . $row["nama"] . "</td>" .
            "<td align='right'>" . $row["pemilik"] . "</td>" .
            "<td><a href='delete.php?id=" . $row["id"] . "'>hapus</a></td>" .
            "<td><a href='edit/index.php?id=".$row["id"]."'>edit</a></td>".
            "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
