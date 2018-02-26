<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$name = filter_input(INPUT_GET, 'name');
if (isset($name) && !empty($name)) {
    $data = array('status' => 1, 'message' => 'Hello' . $name);
} else {
    $data = array('status' => 0, 'message' => 'Please provide with your name');
}
header ('Content-type:application/json');
echo json_encode($data);