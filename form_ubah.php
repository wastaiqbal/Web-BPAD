	<?php
    if (isset($_GET['id_rekap'])) {
    	// ambil data get dari form
        $id_rekap = $_GET['id_rekap'];
        // fungsi query untuk menampilkan data dari tabel pegawai berdasarkan id_rekap
        $result = $mysqli->query("SELECT * FROM datarekap WHERE id_rekap='$id_rekap'") or die('Query Error: '.$mysqli->error);
        $data = $result->fetch_assoc();
    	// buat variabel untuk menampung data
		$id_rekap       = $data['id_rekap'];
		$Nama_Instansi  = $data['Nama_Instansi'];
		$Jumlah  		= $data['Jumlah'];
		$Jumlah_ASN  	= $data['Jumlah_ASN'];
	
		// tutup koneksi
        $mysqli->close(); 
    }
    ?>

	<div class="row">
        <div class="col-md-12">
			<div class="alert alert-info" role="alert">
  				<i class="fas fa-edit"></i> Ubah Data Pegawai
			</div>

			<div class="card">
			  	<div class="card-body">
			    	<form class="needs-validation" action="proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
					  	<div class="row">
					    	<div class="col">
					      		<div class="form-group col-md-12">
									<label>id_rekap</label>
									<input type="text" class="form-control" name="id_rekap" maxlength="18" value="<?php echo $id_rekap; ?>" required>
									<div class="invalid-feedback">id_rekap tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Nama_Instansi</label>
									<input type="text" class="form-control" name="Nama_Instansi" autocomplete="off" value="<?php echo $Nama_Instansi; ?>" required>
									<div class="invalid-feedback">Nama_Instansi tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Jumlah</label>
									<input type="text" class="form-control" name="Nama_Instansi" autocomplete="off" value="<?php echo $Jumlah; ?>" required>
									<div class="invalid-feedback">Jumlah tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Jumlah_ASN</label>
									<input type="text" class="form-control" name="Jumlah_ASN" autocomplete="off" value="<?php echo $Jumlah_ASN; ?>" required>
									<div class="invalid-feedback">Jumlah_ASN tidak boleh kosong.</div>
								</div>

								
					  	<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-5">
			                <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan">
				  		</div>
					</form>
			  	</div>
			</div>
        </div>
	</div>

