<?php

namespace App\Services;

use App\Models\Basket;
use App\Models\Product;
use App\Models\Setting;

class BasketService
{

    public static function add($id)
    {
        $product = Product::find($id);

        if ($product) {
            $basketItem = Basket::where('product_id', $product->id)->first();

            if ($basketItem === null) {
                return Basket::create([
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'count' => 1,
                ]);
            } else {
                $count = $basketItem->count + 1;

                $basketItem->update([
                    "count" => $count,
                ]);

                return $basketItem;
            }
        }

        return "Product not found.";
    }
    public static function multipleAdd()
    {
    }
    public static function update($id, $count)
    {

        $product = Product::find($id);

        if ($product) {
            $basketItem = Basket::where('product_id', $product->id)
                ->first();

            $basketItem->update([
                "count" => $count,
            ]);

            return $basketItem;
        }

        return "Product not found.";
    }
    public static function get($id)
    {
        if (Basket::find($id)) {
            return Basket::find($id);
        } else {
            return 'Basket is empty';
        }
    }
    public static function getAll()
    {
        if (Basket::all()) {
            return Basket::all();
        } else {
            return 'Basket is empty';
        }
    }
    public static  function destroy()
    {
        return Basket::truncate();
    }
    public static function subtotal()
    {
        $subtotal = 0;

        if (Basket::all()) {
            $products = Basket::all();

            foreach ($products as $product) {
                $subtotal += $product->price * $product->count;
            }

            return $subtotal;
        } else {
            return 'Basket is empty';
        }
    }
    public static function total()
    {
        $total = 0;

        if (Basket::all()) {
            $products = Basket::all();

            foreach ($products as $product) {
                $total += $product->price * $product->count;
            }

            return ($total * (100 + Setting::where('key', '=', 'tax')
                ->first()->value)) / 100;
        } else {
            return 'Basket is empty';
        }
    }
    public static function tax()
    {
        $tax = Setting::where('key', '=', 'tax')
            ->first()->value;
        return $tax;
    }
    public static function setTax(int $tax)
    {
        $dbtax = Setting::where('key', '=', 'tax')
            ->first()
            ->update(['value' => $tax]);


        return $dbtax;
    }

    public static function count()
    {
        return Basket::count();
    }
    public static function delete($id)
    {
        $basketItem = Basket::find($id);

        if ($basketItem) {
            return $basketItem->delete();
        } else {
            return "item not found";
        }
    }
}
