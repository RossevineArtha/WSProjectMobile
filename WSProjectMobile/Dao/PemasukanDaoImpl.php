<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pengeluwaran
 *
 * @author LENOVO
 */
class PemasukanDaoImpl {
     public function getAllPemasukan(){
       $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM pemasukan";
        $result=$link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Pemasukan');
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function getPemasukanFromDb($id){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM pemasukan WHERE idPemasukan=? LIMIT 1";
        $stmt=$link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result=$stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function addPemasukan(Pemasukan $pemasukan){
        $link= PDOUtil::createPDOConnection();
        $query="INSERT INTO pemasukan(judulPemasukan, jumlahPemasukan, informasiPemasukan, waktuPemasukan, categoryPemasukan_idCategoryPemasukan, user_idUser) VALUES (?,?,?,?,?,?)";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1, $pemasukan->getJudulPengeluwaran(), PDO::PARAM_STR);
        $stmt->bindValue(2, $pemasukan->getJumlahPengeluwaran(), PDO::PARAM_INT);
        $stmt->bindValue(3, $pemasukan->getInformationPengeluwaran(), PDO::PARAM_STR);
        $stmt->bindValue(4, $pemasukan->getWaktuPengeluwaran(), PDO::PARAM_STR);
        $stmt->bindValue(5, $pemasukan->getUser()->getIdUser(), PDO::PARAM_INT);
        $stmt->bindValue(6, $pemasukan->getCategoryPemasukan()->getIdCategoryPemasukan(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
    
    public function updatePemasukan(Pemasukan $pemasukan){
        $link= PDOUtil::createPDOConnection();
        $query="UPDATE pemasukan SET judulPemasukan=?,jumlahPemasukan=?,informasiPemasukan=?,waktuPemasukan=?,categoryPemasukan_idCategoryPemasukan=? WHERE idPemasukan=?";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1, $pemasukan->getJ(), PDO::PARAM_STR);
        $stmt->bindValue(2, $pemasukan->getJumlahPemasukan(), PDO::PARAM_INT);
        $stmt->bindValue(3, $pemasukan->getInformationPemasukan(), PDO::PARAM_STR);
        $stmt->bindValue(4, $pemasukan->getWaktuPemasukan(),PDO::PARAM_STR);
        $stmt->bindValue(5, $pemasukan->getCategoryPemasukan()->getIdCategoryPemasukan(), PDO::PARAM_INT);
         $stmt->bindValue(6, $pemasukan->getIdPemasukan(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
    
    public function deletePemasukan(Pemasukan $pemasukan){
        $link= PDOUtil::createPDOConnection();
        $query="DELETE FROM pemasukan WHERE idPemasukan=?";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1, $pengeluwaran->getId(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
}
