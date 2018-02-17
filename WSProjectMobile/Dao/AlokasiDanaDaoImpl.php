<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlokasiDataDaoImpl
 *
 * @author LENOVO
 */
class AlokasiDanaDaoImpl {

    public function getAllAlokasiDana() {
        $link = PDOUtil::createPDOConnection();
        $query = "SELECT * FROM alokasidana";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'alokasidana');
        PDOUtil::closePDOConnection($link);
        return $result;
    }

    public function getAlokasiDanaFromDb($id) {
        $link = PDOUtil::createPDOConnection();
        $query = "SELECT * FROM alokasidana WHERE idAlokasiDana=? LIMIT 1";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result = $stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }

    public function addAlokasiDana(AlokasiDana $alokasiDana) {
        $link = PDOUtil::createPDOConnection();
        $query = "INSERT INTO alokasidana(namaAlokasiDana, jumlahAlokasiDana, user_idUser) VALUES (?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $alokasiDana->getNamaAlokasi(), PDO::PARAM_STR);
        $stmt->bindValue(2, $alokasiDana->getJumlahAlokasi(), PDO::PARAM_INT);
        $stmt->bindValue(3, $alokasiDana->getIdUser()->getId(), PDO::PARAM_INT);
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }

    public function updateAlokasiDana(AlokasiDana $alokasiDana) {
        $link = PDOUtil::createPDOConnection();
        $query = "UPDATE alokasidana SET namaAlokasiDana=?,jumlahAlokasiDana=?,user_idUser=? WHERE idAlokasiDana=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $alokasiDana->getNamaAlokasi(), PDO::PARAM_STR);
        $stmt->bindValue(2, $alokasiDana->getJumlahAlokasi(), PDO::PARAM_INT);
        $stmt->bindValue(3, $alokasiDana->getIdUser()->getId(), PDO::PARAM_INT);
        
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }

    public function deleteAlokasiDana(AlokasiDana $alokasiDana) {
        $link = PDOUtil::createPDOConnection();
        $query = "DELETE FROM alokasidana WHERE idAlokasiDana=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $alokasiDana->getIdAlokasiDana(), PDO::PARAM_INT);
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }

}
