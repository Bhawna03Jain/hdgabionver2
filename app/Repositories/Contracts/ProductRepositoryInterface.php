<?php
namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
    public function restore($id);
    // public function getCountryIdByCode($code);

}
