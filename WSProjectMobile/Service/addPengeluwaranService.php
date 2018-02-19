<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../entity/Pengeluwaran.php';
include_once '../dao/PengeluwaranDaoImpl.php';
include_once '../util/PDOUtil.php';

$apiKey = filter_input(INPUT_POST, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    //$id = filter_input(INPUT_POST, 'idPengeluwaran');
    $judul = filter_input(INPUT_POST, 'judulPengeluwaran');
    $jumlah = filter_input(INPUT_POST, 'jumlahPengeluwaran');
    $information = filter_input(INPUT_POST, 'informationPengeluwaran');
    $waktu = filter_input(INPUT_POST, 'waktuPengeluwaran');
    $idCate = filter_input(INPUT_POST, 'categoryPengeluwaran_idCategoryPengeluwaran');
    $idUser = filter_input(INPUT_POST, 'user_idUser');
  
    
    if (isset($judul) && !empty($judul) && isset($jumlah) && !empty($jumlah) 
            && isset($information) && !empty($information) && isset($waktu) && !empty($waktu) 
            && isset($idCate) && !empty($idCate) && isset($idUser) && !empty($idUser) ) {
         $pengeluwaranDao = new PengeluwaranDaoImpl();
        $pengeluwaran = new Pengeluwaran();
        $pengeluwaran->setJumlahPengeluwaran($jumlah);
        $pengeluwaran->setInformationPengeluwaran($information);
        $pengeluwaran->setJudulPengeluwaran($judul);
        $pengeluwaran->setUserID($idUser);
        $pengeluwaran->setWaktuPengeluwaran($waktu);
        
        $pengeluwaran->setCategoryPengeluwaran($idCate);
        
        $pengeluwaranDao->addPengeluwaran($pengeluwaran);
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