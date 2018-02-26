<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDaoImpl
 *
 * @author LENOVO
 */
class UserDaoImpl {

    /**
     *
     * @var User
     */
    private $data;

    function setData(User $data) {
        $this->data = $data;
    }

    public function login() {
        if (isset($this->data) && !empty($this->data)) {
           
            $query = "SELECT * FROM user WHERE email = ? AND password = MD5(?) LIMIT 1";
             $link = PDOUtil::createPDOConnection();
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $this->data->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->data->getPassword(), PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            $result = $stmt->fetch();
            $this->data = null;
            PDOUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
    }

    public function addUser() {
        if (isset($this->data) && !empty($this->data)) {
            $link = PDOUtil::createPDOConnection();
            $query = "INSERT INTO user(name,email,password) VALUES (?,?,MD5(?))";
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $this->data->getName(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->data->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(3, $this->data->getPassword(), PDO::PARAM_STR);
            $link->beginTransaction();
            if ($stmt->execute()) {
                $link->commit();
            } else {
                $link->rollBack();
            }
            PDOUtil::closePDOConnection($link);
        }
        
    }

}
