<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../entity/Pemasukan.php';
include_once '../dao/PemasukanDaoImpl.php';
include_once '../util/PDOUtil.php';

$apiKey = filter_input(INPUT_POST, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    $id = filter_input(INPUT_POST, 'idPemasukan');
    $judul = filter_input(INPUT_POST, 'judulPemasukan');
    $jumlah = filter_input(INPUT_POST, 'jumlahPemasukan');
    $information = filter_input(INPUT_POST, 'informationPemasukan');
    $waktu = filter_input(INPUT_POST, 'waktuPemasukan');
    $idCate = filter_input(INPUT_POST, 'categoryPemasukan_idCategoryPemasukan');
    $idUser = filter_input(INPUT_POST, 'user_idUser');
  
    
    if (isset($id) && !empty($id) && isset($judul) && !empty($judul) && isset($jumlah) && !empty($jumlah) 
            && isset($information) && !empty($information) && isset($waktu) && !empty($waktu) 
            && isset($idCate) && !empty($idCate) && isset($idUser) && !empty($idUser) ) {
              $pemasukanDao = new PemasukanDaoImpl();
        $pemasukan_o = new Pemasukan();
        $pemasukan_o->setJumlahPemasukan($jumlah);
        $pemasukan_o->setInformationPemasukan($information);
        $pemasukan_o->setJudulPemasukan($judul);
        $pemasukan_o->setUserID($idUser);
        $pemasukan_o->setWaktuPemasukan($waktu);
        $pemasukan_o->setIdPemasukan($id);
        
        $pemasukan_o->setCategoryPemasukan($idCate);
        
        $pemasukanDao->updatePemasukan($pemasukan_o);
        $jsonData = array();
        $jsonData['status'] = 1;
        $jsonData['message'] = 'Data successfully added';
        echo json_encode($jsonData);
    } else {
        $jsonData = array();
        $jsonData['status'] = 2;
        $jsonData['message'] = 'Name is null';
        echo json_encode($jsonData);
    }
} else {
    $jsonData = array();
    $jsonData['status'] = 2;
    $jsonData['message'] = 'API Key not recognized';
    echo json_encode($jsonData);
}