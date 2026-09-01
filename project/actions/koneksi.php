<?php 

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{

    $conn = new mysqli('localhost','root','','warehouse_logistik');
    // $conn = mysqli_init();
    // $conn->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, true);
    // $conn->real_connect("localhost","root","","warehouse_logistik");
    

} catch(Exception $e) {

    exit("Koneksi bermasalah: ".$e->getMessage());

    }