<?php
    require_once 'db/connection.php';
    require 'utils/uuid.php';

    $uuid = guidv4();
    $nama = $_POST['nama'];
    $noIdentitas = $_POST['noIdentitas'];
    $noHP = $_POST['noHP'];
    $kelasTiket = $_POST['kelasTiket'];
    $tanggalKeberangkatan = $_POST['tanggalKeberangkatan'];
    $penumpangBukanLansia = $_POST['jumlahPenumpangBukanLansia'];
    $penumpangLansia = $_POST['jumlahPenumpangLansia'];
    $jumlahPenumpang = $penumpangBukanLansia + $penumpangLansia;

    if ($kelasTiket == 'Ekonomi') {
        $hargaTiket = 200000;
    }
    
    if ($kelasTiket == 'Eksekutif') {
    $hargaTiket = 250000;
    }

    if ($kelasTiket == 'Bisnis') {
    $hargaTiket = 300000;
    }

    $totalBayar = ($hargaTiket * $penumpangBukanLansia) + ($hargaTiket * 0.9 * $penumpangLansia);

    $data = array(
        'id' => $uuid,
        'nama' => $nama,
        'noIdentitas' => $noIdentitas,
        'noHP' => $noHP,
        'kelasTiket' => $kelasTiket,
        'tanggalKeberangkatan' => $tanggalKeberangkatan,
        'penumpangBukanLansia' => $penumpangBukanLansia,
        'penumpangLansia' => $penumpangLansia
    );


    $query = "insert into transaksi values ('$uuid', '$nama', '$noIdentitas', '$noHP', '$kelasTiket', '$jumlahPenumpang', '$hargaTiket', '$totalBayar')";

    
    if (mysqli_query($conn, $query)) {
        $response = array(
            'success' => 'true',
            'message' => 'Berhasil simpan data',
            'data' => $data,
        );
    
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array(
            'success' => 'false',
            'message' => 'Gagal simpan data',
        );
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
?>