<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = 'datarekap';
    // Table's primary key
    $primaryKey = 'id_rekap';

    $columns = array(
        array( 'db' => 'id_rekap', 'dt' => 1 ),
        array( 'db' => 'Nama_Instansi', 'dt' => 2 ),
        array( 'db' => 'Jumlah', 'dt' => 3 ),
        array( 'db' => 'Jumlah_ASN', 'dt' => 4 ),
    );

    // SQL server connection information
    require_once "config/database.php";
    // ssp class
    require 'config/ssp.class.php';
    // require 'config/ssp.class.php';

    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );
} else {
    echo '<script>window.location="index.php"</script>';
}
?>