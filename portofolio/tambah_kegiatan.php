<?php
$koneksi = new mysqli("localhost", "root", "", "portofolio_db");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$nama_kegiatan = $_POST['nama_kegiatan'];
$waktu_kegiatan = $_POST['waktu_kegiatan'];

$nama_file = $_FILES['bukti_kegiatan']['name'];
$lokasi_tmp = $_FILES['bukti_kegiatan']['tmp_name'];
$folder_tujuan = "uploads/" . $nama_file;

// Pastikan folder uploads sudah ada
if (!is_dir("uploads")) {
    mkdir("uploads");
}

if (move_uploaded_file($lokasi_tmp, $folder_tujuan)) {
    $sql = "INSERT INTO kegiatan (nama_kegiatan, waktu_kegiatan, bukti_kegiatan)
            VALUES ('$nama_kegiatan', '$waktu_kegiatan', '$folder_tujuan')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='index.html';</script>";
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }
} else {
    echo "Upload file gagal.";
}

$koneksi->close();
?>
