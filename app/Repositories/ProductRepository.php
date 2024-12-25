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
public function restore($id){

    $product = $this->model->withTrashed()->where('id', $id)->first();

    if ($product && $product->trashed()) {
        $product->restore(); // This restores the product
    }
    return $product;
}
    public function update(array $data)
    {
        $product = $this->model->find($data['product_id']);
        if ($product) {
            $product=$product->update($data);
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
    public function getproductsByCatIdAndSku($sku, $cat_id)
    {
        $prod=$this->model->where('category_id', $cat_id)->where('sku', $sku) // Ensure soft deleted records are included
        ->withTrashed()->first();

        return $prod;
    }
    public function getProductsWithAttributesByCategoryCodes(array $cat_codes)
    {
        return Product::whereHas('category', function ($query) use ($cat_codes) {
            $query->whereIn('code', $cat_codes); // Filter categories by codes
        })->with('attributes') // Load product attributes if necessary
          ->get();
    }
    public function isProductByNameExist($name)
    {
        $exists = Product::where('name', $name)->exists();

        return $exists;
    }
    public function isProductByArticleExist($article)
    {
        $exists = Product::where('article_no', $article)->exists();

        return $exists;
    }
    public function isProductByHSCodeExist($hs_code)
    {
        $exists = Product::where('hs_code', $hs_code)->exists();

        return $exists;
    }
    public function getLastNo($column){
        $lastArticleNo =  Product::max($column);
        return $lastArticleNo;
    }

}
