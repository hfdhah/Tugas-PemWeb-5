<form action="edit.php" method="POST">
<?php
include 'koneksi.php';
$id = $_GET['id'] ?? '';
$data = ['nim' => '', 'nama' => '', 'jurusan' => ''];

if ($id) {
    $ambildata = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id=$id");
    $data = mysqli_fetch_array($ambildata) ?? $data;
}
?>
NIM: <input type="text" name="nim" value="<?php echo htmlspecialchars($data['nim']); ?>"><br>
Nama: <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>"><br>
Jurusan: <input type="text" name="jurusan" value="<?php echo htmlspecialchars($data['jurusan']); ?>"><br>
<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
<input type="submit" name="submit" value="Edit Data">
</form>

<?php
if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $id = $_POST['id'];

    $query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id='$id'";

    if(mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diedit'); window.location='read.php';</script>";
    } else {
        echo "Gagal mengedit data: " . mysqli_error($koneksi);
    }
}
?>
