<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pemasukan
 *
 * @author LENOVO
 */
class Pemasukan {

    private $idPemasukan;
    private $judulPemasukan;
    private $jumlahPemasukan;
    private $informationPemasukan;
    private $waktuPemasukan;
    private $categoryPemasukan;
    private $userID;
    
    public function __construct() {
        $this->$categoryPemasukan = new CategoryPemasukan();
        $this->userID = new User();
    }

    function getIdPemasukan() {
        return $this->idPemasukan;
    }

    function getJudulPemasukan() {
        return $this->judulPemasukan;
    }

    function getJumlahPemasukan() {
        return $this->jumlahPemasukan;
    }

    function getInformationPemasukan() {
        return $this->informationPemasukan;
    }

    function getWaktuPemasukan() {
        return $this->waktuPemasukan;
    }

    function getCategoryPemasukan() {
        return $this->categoryPemasukan;
    }

    function getUserID() {
        return $this->userID;
    }

    function setIdPemasukan($idPemasukan) {
        $this->idPemasukan = $idPemasukan;
    }

    function setJudulPemasukan($judulPemasukan) {
        $this->judulPemasukan = $judulPemasukan;
    }

    function setJumlahPemasukan($jumlahPemasukan) {
        $this->jumlahPemasukan = $jumlahPemasukan;
    }

    function setInformationPemasukan($informationPemasukan) {
        $this->informationPemasukan = $informationPemasukan;
    }

    function setWaktuPemasukan($waktuPemasukan) {
        $this->waktuPemasukan = $waktuPemasukan;
    }

    function setCategoryPemasukan($categoryPemasukan) {
        $this->categoryPemasukan = $categoryPemasukan;
    }

    function setUserID($userID) {
        $this->userID = $userID;
    }


    public function jsonSerialize() {
        return get_object_vars($this);
    }

    
}
