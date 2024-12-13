<?php
namespace App\Repositories\Contracts;
use App\Models\Locale;

interface LocaleRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
    public function getCountryByCountryID($countryid);
}
