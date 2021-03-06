<?php


namespace App\Service;


interface CategorieService
{
    public function getAllCategories();

    public function save($categorie);

    public function findById($id);


    public function deleteCategorie($categorie);

    public function updateCategorie($categorie);
}
