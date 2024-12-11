<?php

namespace App\Repositories\Contracts;

interface BoqConfigRepositoryInterface
{
    // public function getAll();
    public function find($id);
    // public function create(array $data);
    // public function update($id, array $data);
    // public function delete($id);
    // public function getBoqWithMaterial();
    // public function getBoqWithManufacturing($boqconfigid);
    // public function getBoqWithTaxes();
    public function getIdByType(String $type);

}
