<?php

require_once './app/Models/pathModel.php';

class CategoryModel extends PathModel{
    function __construct(){
        parent::__construct();
    }

    function getCategory($id){
        $query = $this->db->prepare("SELECT * FROM Category WHERE id_category = ?");
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
        $query = $this->db->prepare("SELECT * FROM Category ORDER BY id_alcohol_content");
        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    function getCategoriesByAlcoholContent($brand){
        $query = $this->db->prepare("SELECT a.*, b.name as AlcoholContentName FROM Category a
                                    INNER JOIN AlcoholContent b ON a.id_alcohol_content = b.id_alcohol_content
                                    WHERE b.name = ? ORDER BY name");
        $query->execute([$brand]);

        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $categories;
    }

    private function uploadImage($image){
        $path;
        if($_FILES['photo']['type'] == "image/jpg")
            $path = ".jpg";
        else if($_FILES['photo']['type'] == "image/png")
            $path = ".png";
        else
            $path = ".jpeg";
        $target = 'img/images-db/categories/' . uniqid() . $path;
        move_uploaded_file($image, $target);
        return $target;
    }

    function deleteImage($image){
        unlink($image);
    }

    function deleteCategoryById($id){
        $category = $this->getCategoryById($id);

        $query = $this->db->prepare("DELETE FROM Category WHERE id_category = ?");
        $query->execute([$id]);

        $this->deleteImage($category[0]->$image);
    }

    function editCategory($name, $brand, $amount, $id_alcohol_content, $image, $id){
        $category = $this->getCategoryById($id);
        $imgPath = $this->uploadImage($image);
        $query = $this->db->prepare("UPDATE Category SET name = ?
                                                        brand = ?
                                                        amount = ?
                                                        id_alcohol_content = ?
                                                        image = ?
                                    WHERE id_category = ?");

        $query->execute([$name, $brand, $amount, $id_alcohol_content, $imgPath, $id]);
        $this->deleteImage($category[0]->$image);
    }


}