<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\BasketService;

class BasketController extends Controller
{
    public function add($id)
    {
        dd(BasketService::add($id));
    }
    public function multipleAdd()
    {
    }
    public function update($id, $count)
    {
        dd(BasketService::update($id, $count));
    }
    public function get($id)
    {
        dd(BasketService::get($id));
    }
    public function getAll()
    {
        dd(BasketService::getAll());
    }
    public function destroy()
    {
        dd(BasketService::destroy());
    }
    public function subtotal()
    {
        dd(BasketService::subtotal());
    }
    public function total()
    {
        dd(BasketService::total());
    }
    public function tax()
    {
        dd(BasketService::tax());
    }
    public function setTax($tax)
    {
        dd(BasketService::setTax($tax));
    }

    public function count()
    {
        dd(BasketService::count());
    }
    public function delete($id)
    {
        dd(BasketService::delete($id));
    }
}
