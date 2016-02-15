<?php
$key = $POST['key'];
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "apple";

$mysqli = new mysqli($myHost,$myUser,$myPass,$myDbs);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", $mysqli->connect_error());
    exit();
}

$sql = "SELECT * FROM 'alat' WHERE nama_alat = $key;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID alat: " . $row["id_alat"]. " - Nama Alat: " . $row["nama_alat"]. " " . $row["lokasi"]. $row["kondisi"]. $row["kategori"].$row["ketersediaan"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>