<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Entity/Pemasukan.php';
include_once '../Dao/PemasukanDaoImpl.php.php';
include_once '../Util/PDOUtil.php';

$apiKey = filter_input(INPUT_GET, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    $pemasukanDaoImpl = new PemasukanDaoImpl();
    $result = $pemasukanDaoImpl->getAllPemasukan();
    $pemasukans = array();
    /* @var $book Book */
    foreach ($result as $p) {
        array_push($pemasukans, $p);
    }
    echo json_encode($pemasukans);
} else {
    $jsonData = array();
    $jsonData['status'] = 2;
    $jsonData['message'] = 'API Key not recognized';
    echo json_encode($jsonData);
}