    <div class="row">
        <div class="col-md-12">
        <?php
        // fungsi untuk menampilkan pesan
        // jika alert = "" (kosong)
        // tampilkan pesan "" (kosong)
        if (empty($_GET['alert'])) {
            echo "";
        }
        // jika alert = 1
        // tampilkan pesan Sukses "Data rekap berhasil disimpan"
        elseif ($_GET['alert'] == 1) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Sukses!</strong> Data rekap berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } 
        // jika alert = 2
        // tampilkan pesan Sukses "Data rekap berhasil diubah"
        elseif ($_GET['alert'] == 2) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Sukses!</strong> Data rekap berhasil diubah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } 
        // jika alert = 3
        // tampilkan pesan Sukses "Data rekap berhasil dihapus"
        elseif ($_GET['alert'] == 3) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Sukses!</strong> Data rekap berhasil dihapus.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } 
        // jika alert = 4
        // tampilkan pesan Gagal "NIP sudah ada"
        elseif ($_GET['alert'] == 4) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-times-circle"></i> Gagal!</strong> NIP <b><?php echo $_GET['nip']; ?></b> sudah ada.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
            
            <!-- Tabel rekap untuk menampilkan data rekap dari database -->
            <table id="tabel-pegawai" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Id Rekap</th>
                        <th>Intansi</th>
                        <!-- <th>Jenis Roda</th> -->
                        <th>Jumlah</th>
                        <th>Jumlah ASN</th>
                        <th></th>
                    </tr>
                </thead>
            </table>

            <br>

            <!-- <table id="tabel-kendaraan" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nopol</th>
                        <th>Jenis Roda</th>
                        <th>Merek</th>
                        <th>Tipe</th>
                        <th>Penanggung Jawab</th>
                        <th></th>
                    </tr>
                </thead>
            </table> -->
        </div>
    </div>

    <!-- datatables serverside processing -->
    <script type="text/javascript">
    $(document).ready(function() {
        // initiate dataTables plugin
        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var table = $('#tabel-pegawai').DataTable( {
            "bAutoWidth": false,
            "scrollY": '58vh',
            "scrollCollapse": true,
            "processing": true,
            "serverSide": true,
            "ajax": 'data_pegawai.php',     // panggil file data_pegawai.php untuk menampilkan data rekap dari database
            "columnDefs": [ 
                { "targets": 0, "data": null, "orderable": false, "searchable": false, "width": '30px', "className": 'center' },
                { "targets": 1, "width": '100px', "className": 'center' },
                { "targets": 2, "width": '100px', "className": 'center' },
                { "targets": 3, "width": '100px', "className": 'center' },
                { "targets": 4, "width": '100px', "className": 'center' },
                {
                  "targets": 5, "data": null, "orderable": false, "searchable": false, "width": '80px', "className": 'center',
                  "render": function(data, type, row) {
                      var btn = "<a style=\"margin-right:7px\" title=\"Ubah\" class=\"btn btn-outline-info btn-sm\" href=\"?page=ubah&id_rekap="+data[ 1 ]+"\"><i class=\"fas fa-edit\"></i></a><span><a title=\"Hapus\" class=\"btn btn-outline-danger btn-sm\" href=\"proses_hapus.php?id_rekap="+data[ 1 ]+"\"><i class=\"fas fa-trash\"></i></a></span>";
                      return btn;
                  } 
                } 
            ],
            "order": [[ 1, "asc" ]],        // urutkan data berdasarkan nama rekap secara ascending
            "iDisplayLength": 10,           // tampilkan 10 data
            "rowCallback": function (row, data, iDisplayIndex) {
                var info   = this.fnPagingInfo();
                var page   = info.iPage;
                var length = info.iLength;
                var index  = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        } );

        // tampilkan notifikasi saat akan menghapus data
        $('#tabel-pegawai tbody').on( 'click', 'span', function () {
            var data = table.row( $(this).parents('tr') ).data();
            return confirm("Anda yakin ingin menghapus rekap "+ data[ 3 ] +" ?" );
        } );
    } );
    </script>