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
    

     public function login(User $user) {
        $link = PDOUtil::createPDOConnection();
        $query = "SELECT name FROM user  WHERE email = ? AND password = PASSWORD(?) LIMIT 1";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(2, $user->getPassword(), PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result = $stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }

    public function addUser(User $user) {
        $link = PDOUtil::createPDOConnection();
        $query = "INSERT INTO user(name,email,password) VALUES (?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $user->getName(), PDO::PARAM_STR);
        $stmt->bindValue(2, $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(3, $user->getPasseword(), PDO::PARAM_STR);
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }

}
