<?php
namespace App\Repositories\Contracts;

interface AttributeRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function create(array $data);
    public function update($data);
    public function delete($id);
    // public function getCountryIdByCode($code);

}
