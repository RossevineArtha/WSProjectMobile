<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlokasiData
 *
 * @author LENOVO
 */
class AlokasiDana {

    private $idAlokasiDana;
    private $namaAlokasi;
    private $jumlahAlokasi;
    private $idUser;
  

    public function __construct() {
        $this->userID = new User();
    }
    function getIdAlokasiDana() {
        return $this->idAlokasiDana;
    }

    function getNamaAlokasi() {
        return $this->namaAlokasi;
    }

    function getJumlahAlokasi() {
        return $this->jumlahAlokasi;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function setIdAlokasiDana($idAlokasiDana) {
        $this->idAlokasiDana = $idAlokasiDana;
    }

    function setNamaAlokasi($namaAlokasi) {
        $this->namaAlokasi = $namaAlokasi;
    }

    function setJumlahAlokasi($jumlahAlokasi) {
        $this->jumlahAlokasi = $jumlahAlokasi;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

          
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
