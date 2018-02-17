<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryPemasukanDaoImpl
 *
 * @author LENOVO
 */
class CategoryPemasukanDaoImpl {
   public function addNewCategoryPemasukan(CategoryPemasukan $category) {
        $link = PDOUtil::createPDOConnection();
        $query = "INSERT INTO categorypemasukan(name) VALUES(?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $category->getName(), PDO::PARAM_STR);
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
      public function deleteCategoryPemasukan(CategoryPemasukan $category) {
        $link = PDOUtil::createPDOConnection();
        $query = "DELETE FROM categorypemasukan WHERE idCategoryPemasukan = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $category->getName(), PDO::PARAM_INT);
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
     public function getAllCategoryPemasukan(){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM categorypemasukan";
        $result=$link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'CategoryPemasukan');
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function getCategoryPemasukanFromDb($id){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM categorypemasukan WHERE idCategoryPemasukan=? LIMIT 1";
        $stmt=$link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result=$stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }

}
