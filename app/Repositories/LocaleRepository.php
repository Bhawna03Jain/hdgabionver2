<?php
namespace App\Repositories;

use App\Models\Locale;

class LocaleRepository
{
    protected $model;

    public function __construct(Locale $locale)
    {
        $this->model = $locale;
    }

    // Get all locales
    public function getAll()
    {
        return $this->model->all();
    }

    // Find a locale by ID
    public function findById($id)
    {
        return $this->model->find($id);
    }

    // Create a new locale
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Update a locale by ID
    public function update(array $data)
    {
        $locale = $this->model->find($data['id']);
        if ($locale) {
            $locale->update($data);
            return $locale;
        }
        return null;
    }

    // Delete a locale by ID
    public function delete($id)
    {
        $locale = $this->model->find($id);
        if ($locale) {
            $locale->delete();
            return true;
        }
        return false;
    }
    public function findByHostName($hostname)
    {

        $data=$this->model->where(['hostname'=>$hostname])->first();

        if($data){
        return $data;
        }
    else {
        return false;
    }

    }
    public function getCountryByCountryID($countryid){
        return $this->model->where(['country_id' => $countryid])->get();
    }

}
