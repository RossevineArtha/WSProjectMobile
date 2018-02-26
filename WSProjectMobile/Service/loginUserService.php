<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../entity/User.php';
include_once '../dao/UserDaoImpl.php';
include_once '../util/PDOUtil.php';


$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
if (isset($email) && isset($password) && !empty($email) && !empty($password)) {
    $userDao = new UserDaoImpl();
    $user = new User();
    $user->setPassword($password);
    $user->setEmail($email);
    $userDao->setData($user);
    $result =   $userDao->login();
    if (isset($result) && $result->name) {
        $data = array('status' => 1, 'message' => 'Login sucess', 'user' => $result);
    } else {
        $data = array('status' => 0, 'message' => 'Invalid email  or password' ,
            'user' => NULL);
    }
} else {
    $data = array('status' => 0, 'message' => 'Please fill email and password');
}
header('Content-type:application/json');
echo json_encode($data);