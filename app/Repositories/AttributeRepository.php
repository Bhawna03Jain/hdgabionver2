<?php
namespace App\Repositories;

use App\Repositories\Contracts\AttributeRepositoryInterface;
use App\Models\Attribute;


class AttributeRepository implements AttributeRepositoryInterface
{
    protected $model;

    public function __construct(Attribute $Attribute)
    {
        $this->model = $Attribute;
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
        $Attribute = $this->model->find($data['id']);
        if ($Attribute) {
            $Attribute->update($data);
            return $Attribute;
        }
        return null;
    }

    public function delete($id)
    {
        $Attribute = $this->model->find($id);
        if ($Attribute) {
            $Attribute->delete();
            return true;
        }
        return false;
    }
    // public function getAttributeIdByCode($code)
    // {
    //     return $this->model->where(['code' => $code])->first();
    // }

}
