<?php

//FUNCTION TANGGAL INDONESIA

function tgl_indonesia($date) {
    //ARRAY HARI DAN BULAN
    $Hari = array("Minggu","Senin", "Selasa","Rabu","Kamis","Jum'at","Sabtu");
    $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
    //MEMISAHKAN FORMAT TANGGAL, BULAN, TAHUN DENGAN SUBSTRING
    $tahun      = substr($date, 0, 4);
    $bulan      = substr($date, 5, 2);
    $tgl        = substr($date, 8, 2);
    $waktu      = substr($date, 11, 5);
    $hari       = date("w", strtotime($date));
    
    $result     = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." WIB";
    return $result;
}
?>