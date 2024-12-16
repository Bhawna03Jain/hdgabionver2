<?php
namespace App\Repositories;

use App\Repositories\Contracts\CartRepositoryInterface;
use App\Models\CartItem;


class CartRepository implements CartRepositoryInterface
{
    protected $model;

    public function __construct(cartItem $cart)
    {
        $this->model = $cart;
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
public function restore($id){

    $cart = $this->model->withTrashed()->where('id', $id)->first();

    if ($cart && $cart->trashed()) {
        $cart->restore(); // This restores the cart
    }
    return $cart;
}
    public function update(array $data)
    {
        $cart = $this->model->find($data['id']);
        if ($cart) {
            $cart=$cart->update($data);
            return $cart;
        }
        return null;
    }

    public function delete($id)
    {
        $cart = $this->model->find($id);
        if ($cart) {
            $cart->delete();
            return true;
        }
        return false;
    }
    public function getcartByUserIdAndProductId($userid,$productid)
    {
        return $this->model->where('user_id', $userid)
        ->where('product_id', $productid)
        ->first();
    }
    // public function getcartsWithAttributesByCatId($catid)
    // {
    //     $this->model->where('category_id', $catid)->with('attributes')->get();
    //     return $this->model->where('category_id', $catid)->with('attributes')->get();
    // }
    // public function getcartsByCatIdAndSku($sku, $cat_id)
    // {
    //     $prod=$this->model->where('category_id', $cat_id)->where('sku', $sku) // Ensure soft deleted records are included
    //     ->withTrashed()->first();

    //     return $prod;
    // }
}
