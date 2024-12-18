<?php
// panggil file config.php untuk koneksi ke database
require_once "config/config.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    if (isset($_POST['id_rekap'])) {
        // ambil data hasil submit dari form
        $id_rekap          = $mysqli->real_escape_string(trim($_POST['id_rekap']));
        $Nama_Instansi     = $mysqli->real_escape_string(trim($_POST['Nama_Instansi']));
        $Jumlah       = $mysqli->real_escape_string(trim($_POST['Jumlah']));
        $Jumlah_ASN       = $mysqli->real_escape_string(trim($_POST['Jumlah_ASN']));

        $update = $mysqli->query("UPDATE datarekap SET id_rekap     = '$id_rekap',
        Nama_Instansi   = '$Nama_Instansi',
        Jumlah   = '$Jumlah',
        Jumlah_ASN          = '$Jumlah_ASN'
        WHERE id_rekap            = '$id_rekap'")
        or die('Ada kesalahan pada query update : '.$mysqli->error);
        // cek query
        if ($update) {
        // jika berhasil tampilkan pesan berhasil ubah data
        header("location: index.php?alert=2");
        }
    }
}
// tutup koneksi
$mysqli->close();   
?>