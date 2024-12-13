<?php
namespace App\Repositories;

use App\Repositories\Contracts\CountryRepositoryInterface;
use App\Models\Country;


class CountryRepository implements CountryRepositoryInterface
{
    protected $model;

    public function __construct(Country $country)
    {
        $this->model = $country;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {

        return $this->model->create($data);
    }

    public function update(array $data)
    {
        $country = $this->model->find($data['id']);
        if ($country) {
            $country->update($data);
            return $country;
        }
        return null;
    }

    public function delete($id)
    {
        $country = $this->model->find($id);
        if ($country) {
            $country->delete();
            return true;
        }
        return false;
    }
    public function getCountryIdByCode($code)
    {
        return $this->model->where(['code' => $code])->first();
    }

}
