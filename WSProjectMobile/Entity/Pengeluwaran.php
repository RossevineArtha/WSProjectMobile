<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pengeluwaran
 *
 * @author LENOVO
 */
class Pengeluwaran {

    private $id;
    private $judulPengeluwaran;
    private $jumlahPengeluwaran;
    private $informationPengeluwaran;
    private $waktuPengeluwaran;
    private $categoryPengeluwaran;
    private $userID;

    public function __construct() {
        $this->$categoryPengeluwaran = new CategoryPengeluwaran();
        $this->userID = new User();
    }

    function getId() {
        return $this->id;
    }

    function getJudulPengeluwaran() {
        return $this->judulPengeluwaran;
    }

    function getJumlahPengeluwaran() {
        return $this->jumlahPengeluwaran;
    }

    function getInformationPengeluwaran() {
        return $this->informationPengeluwaran;
    }

    function getWaktuPengeluwaran() {
        return $this->waktuPengeluwaran;
    }

    function getCategoryPengeluwaran() {
        return $this->categoryPengeluwaran;
    }

    function getUserID() {
        return $this->userID;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setJudulPengeluwaran($judulPengeluwaran) {
        $this->judulPengeluwaran = $judulPengeluwaran;
    }

    function setJumlahPengeluwaran($jumlahPengeluwaran) {
        $this->jumlahPengeluwaran = $jumlahPengeluwaran;
    }

    function setInformationPengeluwaran($informationPengeluwaran) {
        $this->informationPengeluwaran = $informationPengeluwaran;
    }

    function setWaktuPengeluwaran($waktuPengeluwaran) {
        $this->waktuPengeluwaran = $waktuPengeluwaran;
    }

    function setCategoryPengeluwaran($categoryPengeluwaran) {
        $this->categoryPengeluwaran = $categoryPengeluwaran;
    }

    function setUserID($userID) {
        $this->userID = $userID;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
