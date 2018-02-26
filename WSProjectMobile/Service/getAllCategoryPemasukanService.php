<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../entity/CategoryPemasukan.php';
include_once '../dao/CategoryPemasukanDaoImpl.php';
include_once '../util/PDOUtil.php';


    $catePemasukanDaoImpl = new CategoryPemasukanDaoImpl();
    $result = $catePemasukanDaoImpl->getAllCategoryPemasukan();
    $catepenmasukk = array();
    
    foreach ($result as $p) {
        array_push($catepenmasukk, $p->getName());
    }
    header("content-type:application/json");
    echo json_encode($catepenmasukk);
