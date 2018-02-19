<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../entity/User.php';
include_once '../dao/UserDaoImpl.php';
include_once '../util/PDOUtil.php';

$apiKey = filter_input(INPUT_POST, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if ( isset($email) && !empty($email) && isset($password) && !empty($password)) {
        $userDao = new UserDaoImpl();
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
        $userDao->login($user);
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