<?php
// panggil file config.php untuk koneksi ke database
require_once "config/config.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $Nama_Instansi         = $mysqli->real_escape_string(trim($_POST['Nama_Instansi']));
    $Jumlah         = $mysqli->real_escape_string(trim($_POST['jumlah']));
    $Jumlah_ASN       = $mysqli->real_escape_string(trim($_POST['jumlah_asn']));

    // perintah query untuk mengecek nip
    $result = $mysqli->query("SELECT Nama_Instansi FROM datarekap WHERE Nama_Instansi='$Nama_Instansi'")
                              or die('Ada kesalahan pada query tampil data rekap: '.$mysqli->error);
    $rows = $result->num_rows;
    // jika nip sudah ada
    if ($rows > 0) {
        // tampilkan pesan gagal simpan data
        header("location: index.php?alert=4&nip=$nip");
    }
    // jika nip belum ada
    else {  
            $insert = $mysqli->query("INSERT INTO datarekap(Nama_Instansi,Jumlah,Jumlah_ASN)
                                      VALUES('$Nama_Instansi','$jumlah','$jumlah_ASN')")
                                      or die('Ada kesalahan pada query insert : '.$mysqli->error); 
            // cek query
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: index.php?alert=1");
            }   
        }
    }

// tutup koneksi
$mysqli->close();   
?>