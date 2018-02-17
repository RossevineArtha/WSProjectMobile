<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Book
 *
 * @author LENOVO
 */
class User {

    private $id;
    private $name;
    private $email;
    private $passeword;

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

 
    function getPasseword() {
        return $this->passeword;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }



    function setPasseword($passeword) {
        $this->passeword = $passeword;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

//    
//    public function __set($name, $value) {
//       
//        if (!isset($value)) {
//            switch ($name) {
//                case 'category_id':
//                    $this->role->setId($value);
//                    break;
//                case 'role_name':
//                    $this->role->setName($value);
//                    break;
//                default:
//                    break;
//            }
//        }
//    }
}
