<?php


namespace Modules\Shop\Repository;


use App\Repository\AbstractClass;
use Illuminate\Database\Eloquent\Model;
use Modules\Shop\Entities\Product;


class ShopRepository extends AbstractClass implements ShopInterface
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}
