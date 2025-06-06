<?php
$koneksi = new mysqli("localhost", "root", "", "portofolio_db");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$sql = "SELECT * FROM kegiatan";
$result = $koneksi->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$koneksi->close();
?>
