<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../entity/CategoryPengeluwaran.php';
include_once '../dao/CategoryPengeluwaranDaoImpl.php';
include_once '../util/PDOUtil.php';

header("content-type:application/json");

    $catePengeluwaranDaoImpl = new CategoryPengeluwaranDaoImpl();
    $result = $catePengeluwaranDaoImpl->getAllCategoryPengeluwaran();
    $catepengeluwarans = array();
   
    foreach ($result as $p) {
        array_push($catepengeluwarans, $p->getName());
    }
    echo json_encode($catepengeluwarans);
