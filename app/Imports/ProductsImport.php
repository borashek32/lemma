<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    public function collection(Collection $collection)
    {
//        $products = Product::all();
//        foreach ($collection as $row) {
//            if ($row !== null) {
//                foreach ($products as $product) {
//                    if ($product->where('code', $row[0])->exists()) {
//                        $product->code = $row[0];
//                        $product->title = $row[1];
//                        $product->stock_quantity = $row[2];
//                        $product->price = $row[3];
//                        $product->save();
//                    } else {
//                        Product::create([
//                            'code' => $row[0],
//                            'title' => $row[1],
//                            'stock_quantity' => $row[2],
//                            'price' => $row[3],
//                        ]);
//                    }
//                }
//            } else {
//                $row->destroy();
//            }
//        }

        foreach ($collection as $row) {
            if ($row !== null) {
                if ($product = Product::where('code', $row[0])->first())
                {
                    $product->update([
                            'code'           => $row[0],
                            'title'          => $row[1],
                            'stock_quantity' => $row[2],
                            'price'          => $row[3],
                        ]);
                } else {
                    DB::table('products')
                        ->insert([
                            'code'           => $row[0],
                            'title'          => $row[1],
                            'stock_quantity' => $row[2],
                            'price'          => $row[3],
                        ]);
                }
            }
        }
    }
}
