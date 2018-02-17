<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryPengeluwaran
 *
 * @author LENOVO
 */
class CategoryPemasukan {

    private $idCategoryPemasukan;
    private $name;
    
    function getIdCategoryPemasukan() {
        return $this->idCategoryPemasukan;
    }

    function getName() {
        return $this->name;
    }

    function setIdCategoryPemasukan($idCategoryPemasukan) {
        $this->idCategoryPemasukan = $idCategoryPemasukan;
    }

    function setName($name) {
        $this->name = $name;
    }

    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
