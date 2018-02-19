<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../entity/CategoryPengeluwaran.php';
include_once '../dao/CategoryPengeluwaranDaoImpl.php';
include_once '../util/PDOUtil.php';

$apiKey = filter_input(INPUT_POST, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    $id = filter_input(INPUT_POST, 'idCategoryPengeluwaran');
    if (isset($id) && !empty($id) ) {
        $catePengeluwaranDao = new CategoryPengeluwaranDaoImpl();
        $catePengeluwaran = new CategoryPengeluwaran();
        $catePengeluwaran->setIdCategoryPengeluwaran($id);
        $catePengeluwaranDao->deleteCategoryPengeluwaran($catePengeluwaran);
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