<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PDOUtil {
    public static function createPDOConnection() {
        $link = new PDO("mysql:host=localhost;dbname=expencemanagerproject", "root",
                "");
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $link;
    }
    public static function closePDOConnection(PDO $link) {
        $link = NULL;
    }
}