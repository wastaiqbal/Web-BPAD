<?php
// panggil file config.php untuk koneksi ke database
require_once "config/config.php";
// jika tombol simpan diklik
if (isset($_GET['id_rekap'])) {
    // ambil data get dari form 
    $id_rekap = $_GET['id_rekap'];

    // perintah query untuk menampilkan data foto pegawai berdasarkan id_rekap
    $result = $mysqli->query("SELECT Nama_Instansi FROM datarekap WHERE id_rekap='$id_rekap'")
                              or die('Ada kesalahan pada query tampil data id_rekap: '.$mysqli->error);
    $data = $result->fetch_assoc();
    $foto = $data['Nama_Instansi'];

    // hapus file foto dari folder foto
    // $hapus_file = unlink("foto/$foto");
    // cek hapus file
   
        // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel pegawai
        $delete = $mysqli->query("DELETE FROM datarekap WHERE id_rekap='$id_rekap'")
                                  or die('Ada kesalahan pada query delete : '.$mysqli->error);
        // cek hasil query
        if ($delete) {
            // jika berhasil tampilkan pesan berhasil delete data
            header("location: index.php?alert=3");
        }
    }

// tutup koneksi
$mysqli->close();   
?>