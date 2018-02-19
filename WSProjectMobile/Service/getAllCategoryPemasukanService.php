<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../entity/CategoryPemasukan.php';
include_once '../dao/CategoryPemasukanDaoImpl.php.php';
include_once '../util/PDOUtil.php';

$apiKey = filter_input(INPUT_GET, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    $catePemasukanDaoImpl = new CategoryPemasukanDaoImpl();
    $result = $catePemasukanDaoImpl->getAllCategoryPemasukan();
    $catepenmasukk = array();
    /* @var $book Book */
    foreach ($result as $p) {
        array_push($catepenmasukk, $p);
    }
    echo json_encode($catepenmasukk);
} else {
    $jsonData = array();
    $jsonData['status'] = 2;
    $jsonData['message'] = 'API Key not recognized';
    echo json_encode($jsonData);
}