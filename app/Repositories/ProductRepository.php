<?php
namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Product;


class ProductRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
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
        $product = $this->model->find($data['id']);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return null;
    }

    public function delete($id)
    {
        $product = $this->model->find($id);
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }
    // public function getProductIdByCode($code)
    // {
    //     return $this->model->where(['code' => $code])->first();
    // }
    public function getproductsWithAttributesByCatId($catid)
    {
        $this->model->where('category_id', $catid)->with('attributes')->get();
        return $this->model->where('category_id', $catid)->with('attributes')->get();
    }
}
