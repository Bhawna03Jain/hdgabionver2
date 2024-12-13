<?php


namespace App\Repositories\Contracts;

use App\Models\Category;

interface InventoryConfigRepositoryInterface
{
    public function getByBoqConfigAndId($boqConfigId,$id,$code);
    // public function all();
    // public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    // public function getAllCategoriesWithChildren();
    // public function checkCategoryExists(String $category_name);

    // New methods
    // public function getParentId($id);

    // public function getParentName($Id);



}

