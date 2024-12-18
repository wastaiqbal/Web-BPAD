	<div class="row">
        <div class="col-md-12">
			<div class="alert alert-info" role="alert">
  				<i class="fas fa-edit"></i> Input Data Rekap
			</div>

			<div class="card">
			  	<div class="card-body">
			    	<form class="needs-validation" action="proses_simpan.php" method="post" enctype="multipart/form-data" novalidate>
					  	<div class="row">
					    	<div class="col">
					      		<div class="form-group col-md-12">
									<label>Nama Instansi</label>
									<input type="text" class="form-control" name="Nama_Instansi" autocomplete="off" required>
									<div class="invalid-feedback">Nama Instansi tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Jumlah</label>
									<input type="text" class="form-control" name="Jumlah" autocomplete="off" required>
									<div class="invalid-feedback">Jumlah tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Jumlah ASN</label>
									<input type="text" class="form-control" name="Jumlah_ASN" autocomplete="off" required>
									<div class="invalid-feedback">Jumlah ASN tidak boleh kosong.</div>
								</div>

								<!-- <div class="form-group col-md-12">
									<label class="mb-3">Jenis Kelamin</label>
									<div class="custom-control custom-radio">
									    <input type="radio" class="custom-control-input" id="customControlValidation2" name="jenis_kelamin" value="Laki-laki" required>
									    <label class="custom-control-label" for="customControlValidation2">Laki-laki</label>
									</div>
									<div class="custom-control custom-radio mb-4">
									    <input type="radio" class="custom-control-input" id="customControlValidation3" name="jenis_kelamin" value="Perempuan" required>
									    <label class="custom-control-label" for="customControlValidation3">Perempuan</label>
									    <div class="invalid-feedback">Pilih salah satu jenis kelamin.</div>
									</div>
								</div> -->
								
					      		<!-- <div class="form-group col-md-12">
									<label>Agama</label>
									<select class="form-control" name="agama" autocomplete="off" required>
								      	<option value=""></option>
										<option value="Islam">Islam</option>
										<option value="Kristen Protestan">Kristen Protestan</option>
										<option value="Kristen Katolik">Kristen Katolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Buddha">Buddha</option>
								    </select>
									<div class="invalid-feedback">Agama tidak boleh kosong.</div>
								</div>
					    	</div> -->

					    	<!-- <div class="col">
							<div class="form-group col-md-12">
									<label>Id Intansi</label>
									<input type="text" class="form-control" name="id_intansi" autocomplete="off" required>
									<div class="invalid-feedback">Intansi tidak boleh kosong.</div>
								</div>
								
								<div class="form-group col-md-12">
									<label>Nama Pegawai</label>
									<input type="text" class="form-control" name="nama_pegawai" autocomplete="off" required>
									<div class="invalid-feedback">Nama Pegawai tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Tanggal Lahir</label>
									<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" required>
									<div class="invalid-feedback">Tanggal Lahir tidak boleh kosong.</div>
								</div> -->

					  	<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-5">
			                <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan">
				  		</div>
					</form>
			  	</div>
			</div>
        </div>
	</div>
