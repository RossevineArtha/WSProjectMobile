<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PengeluwaranDaoImpl
 *
 * @author LENOVO
 */
class PengeluwaranDaoImpl {
     public function getAllPengeluwaran(){
       $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM pengeluwaran";
        $result=$link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'pengeluwaran');
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function getPengeluwaranFromDb($id){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM pengeluwaran WHERE idPengeluwaran=? LIMIT 1";
        $stmt=$link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result=$stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function addPengeluwaran(Pengeluwaran $pengeluwaran){
        $link= PDOUtil::createPDOConnection();
        $query="INSERT INTO pengeluwaran(judulPengeluwaran, jumlahPengeluwaran, informationPengeluwaran, waktuPengeluwaran, categoryPengeluwaran_idCategoryPengeluwaran, user_idUser) VALUES (?,?,?,?,?,?)";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1, $pengeluwaran->getJudulPengeluwaran(), PDO::PARAM_STR);
        $stmt->bindValue(2, $pengeluwaran->getJumlahPengeluwaran(), PDO::PARAM_INT);
        $stmt->bindValue(3, $pengeluwaran->getInformationPengeluwaran(), PDO::PARAM_STR);
        $stmt->bindValue(4, $pengeluwaran->getWaktuPengeluwaran(), PDO::PARAM_STR);
        $stmt->bindValue(4, $pengeluwaran->getUser()->getIdUser(), PDO::PARAM_INT);
        $stmt->bindValue(5, $pengeluwaran->getCategoryPengeluwaran()->getIdCategoryPengeluwaran(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
    
    public function updatePengeluwaran(Pengeluwaran $pengeluwaran){
        $link= PDOUtil::createPDOConnection();
        $query="UPDATE pengeluwaran SET judulPengeluwaran=?,jumlahPengeluwaran=?,informationPengeluwaran=?,waktuPengeluwaran=?,categoryPengeluwaran_idCategoryPengeluwaran=? WHERE idPengeluwaran=?";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1, $pengeluwaran->getJudulPengeluwaran(), PDO::PARAM_STR);
        $stmt->bindValue(2, $pengeluwaran->getJumlahPengeluwaran(), PDO::PARAM_INT);
        $stmt->bindValue(3, $pengeluwaran->getInformationPengeluwaran(), PDO::PARAM_STR);
        $stmt->bindValue(4, $pengeluwaran->getWaktuPengeluwaran(), PDO::PARAM_STR);
        $stmt->bindValue(5, $pengeluwaran->getCategoryPengeluwaran()->getIdCategoryIncome(), PDO::PARAM_INT);
         $stmt->bindValue(6, $pengeluwaran->getId(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
    
    public function deletePengeluwaran(Pengeluwaran $pengeluwaran){
        $link= PDOUtil::createPDOConnection();
        $query="DELETE FROM pengeluwaran WHERE idPengeluwaran=?";
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
