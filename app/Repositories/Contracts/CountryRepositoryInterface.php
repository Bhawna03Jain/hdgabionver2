<?php
namespace App\Repositories\Contracts;

interface CountryRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
    public function getCountryIdByCode($code);

}
