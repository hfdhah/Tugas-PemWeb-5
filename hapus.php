<?php
include 'koneksi.php';
$query = "DELETE FROM mahasiswa WHERE id='$_GET[id]'";

if ($koneksi->query($query) === TRUE) {
    echo "<script>alert('Data berhasil dihapus'); window.location='read.php';</script>";

} else {
    echo "<script>alert('Data gagal dihapus: " . $koneksi->error . "'); window.location='read.php';</script>";
}

$koneksi->close();
?>
