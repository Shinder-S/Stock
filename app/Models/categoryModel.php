<?php

require_once './app/Models/pathModel.php';

class CategoryModel extends PathModel{
    function __construct(){
        parent::__construct();
    }

    function getCategory($id){
        $query = $this->db->prepare("SELECT * FROM Categories WHERE id_category = ?");
        $query->execute([$id]);

        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }

    function getCategoryById($id){
        $query = $this->db->prepare("SELECT a.*, b.name as AlcoholContent, b.brand as BrandAlcoholContent,
                                    c.name as Drink, c.BrandAlcoholContent as BrandDrink, c.id_drink
                                    FROM Category a INNER JOIN AlcoholContent b ON a.id_category = b.id_category
                                    INNER JOIN Drink c ON b.id_drink = c.id_drink
                                    EHRE id_category = ?");

        $query->execute([$id]);

        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }

    function getAllCategories(){
        $query = $this->db->prepare("SELECT * FROM Categories ORDER BY alcoholContent");
        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    function getAlcoholContentCategory($brand){
        $query = $this->db->prepare("SELECT a.*, b.brand as alcoholContent FROM Category a
                                    INNER JOIN alcoholContent b ON a.id_alcoholContent = b.id_alcoholContent
                                    WHERE b.name = ? ORDER BY alcoholContent");
        $query->execute([$brand]);

        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $categories;
    }

    private function uploadImage($image){
        $path;
        if($_FILES['photo']['type'] == "image/jpg")
            $path = ".jpg";
        elseif($_FILES['photo']['type'] == "image/png")
            $path = ".png";
        else
            $path = ".jpeg";
        $target = 'img/images-db/categories/' . uniqid() . $path;
        move_uploaded_file($image, $target);
        return $target;
    }

    private function deleteImage($image){
        unlink($image);
    }

    function deleteCategoryById($id){
        $category = $this->getCategoryById($id);

        $query = $this->db->prepare("DELETE FROM Category WHERE id_category = ?");
        $query->execute([$id]);

        $this->deleteImage($category[0]->$image);
    }

    function editCategory($alcoholContent, $brand, $amount, $id_alcoholContent, $image, $id){
        $category = $this->getCategoryById($id);
        $imgPath = $this->uploadImage($image);
        $query = $this->db->prepare("UPDATE Category SET alcoholContent = ?
                                                        brand = ?
                                                        amount = ?
                                                        id_alcoholContent = ?
                                                        image = ?
                                    WHERE id_category = ?");

        $query->execute([$alcoholContent, $brand, $amount, $id_alcoholContent, $imgPath, $id]);
        $this->deleteImage($category[0]->$image);
    }


}