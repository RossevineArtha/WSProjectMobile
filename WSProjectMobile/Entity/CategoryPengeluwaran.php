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
class CategoryPengeluwaran {

    private $idCategoryPengeluwaran;
    private $name;
    function getIdCategoryPengeluwaran() {
        return $this->idCategoryPengeluwaran;
    }

    function getName() {
        return $this->name;
    }

    function setIdCategoryPengeluwaran($idCategoryPengeluwaran) {
        $this->idCategoryPengeluwaran = $idCategoryPengeluwaran;
    }

    function setName($name) {
        $this->name = $name;
    }

    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
