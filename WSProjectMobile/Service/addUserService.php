<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../entity/User.php';
include_once '../dao/UserDaoImpl.php';
include_once '../util/PDOUtil.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
if (isset($name) && !empty($name) && isset($email) && !empty($email) && isset($password) && !empty($password)) {
        $userDao = new UserDaoImpl();
        $user = new User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);
        $userDao->setData($user);
        $userDao->addUser();
        $result = $user;
        $data = array('status' => 1, 'message' => 'add sucess', 'user' => $result);

} 
else {
    $data = array('status' => 0, 'message' => 'Please fill name, email and password');
}
header('Content-type:application/json');
echo json_encode($data);