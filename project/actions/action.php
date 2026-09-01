<?php

class query{

    private $conn;
    public $dataMasuk;
    public $dataKeluar;
    public $labelTanggal;

    function __construct($kon)
    {
        $this->conn = $kon;
    }

    function getDataWeek(){

    $koneksi = $this->conn;

        $dataMasuk = [];
        $dataKeluar = [];
        $labelTanggal = [];

        for ($i = 6; $i >= 0; $i-- ){
            $tanggal = date('Y-m-d', strtotime("-$i day"));
            $labelTanggal[$tanggal] = date('D, d M', strtotime($tanggal));
            $dataMasuk[$tanggal] = 0;
            $dataKeluar[$tanggal] = 0;
        } 

        $sql = "SELECT DATE(tanggal) AS tgl, type, SUM(qty) AS total_qty FROM stock_movement WHERE tanggal >= CURDATE() - INTERVAL 6 DAY GROUP BY DATE(tanggal), type";
        $hasil = $koneksi->query($sql);

        while($row = $hasil->fetch_object()){
            $tgl = $row->tgl;
            if($row->type === 'masuk') $dataMasuk[$tgl] = $row->total_qty;
            if($row->type === 'keluar') $dataKeluar[$tgl] = $row->total_qty;
        }

        $result = new stdClass();

        $result->labelTanggal = $this->labelTanggal;
        $result->dataMasuk = $this->dataMasuk;
        $result->dataKeluar = $this->dataKeluar;

        return $result;
    }
};

