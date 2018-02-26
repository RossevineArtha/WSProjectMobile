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

    /**
     *
     * @var AlokasiDana
     */
    private $data;

    function setData($data) {
        $this->data = $data;
    }

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

    public function addAlokasiDana() {
        if (isset($this->data) && !empty($this->data)) {
            $link = PDOUtil::createPDOConnection();
            $query = "INSERT INTO alokasidana(namaAlokasiDana, jumlahAlokasiDana, dateAwal, dateAkhir, idUser) VALUES (?, ?, ?, ?, ?)";
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $this->data->getNamaAlokasi(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->data->getJumlahAlokasi(), PDO::PARAM_INT);
            $stmt->bindValue(3, $this->data->getDateAwal(), PDO::PARAM_STR);
            $stmt->bindValue(4, $this->data->getDateAkhir(), PDO::PARAM_STR);
            $stmt->bindValue(5, $this->data->getIdUser()->getId(), PDO::PARAM_INT);
              $result = $stmt->execute();
            DBUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
    }

    public function updateAlokasiDana(AlokasiDana $alokasiDana) {
        $link = PDOUtil::createPDOConnection();
        $query = "UPDATE alokasidana SET namaAlokasiDana=?,jumlahAlokasiDana=?,dateAwal=?,dateAkhir=?,idUser=? WHERE idAlokasiDana=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $alokasiDana->getNamaAlokasi(), PDO::PARAM_STR);
        $stmt->bindValue(2, $alokasiDana->getJumlahAlokasi(), PDO::PARAM_INT);
        $stmt->bindValue(3, $alokasiDana->getDateAwal(), PDO::PARAM_STR);
        $stmt->bindValue(4, $alokasiDana->getDateAkhir(), PDO::PARAM_STR);
        $stmt->bindValue(5, $alokasiDana->getIdUser()->getId(), PDO::PARAM_INT);

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
