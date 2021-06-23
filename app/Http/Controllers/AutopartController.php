<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AutopartController extends Controller
{
    public function autoparts()
    {
        $search = request()->query('search');
        if ($search) {
            $products = Product::where('title', 'LIKE', "%{$search}%")
                ->orWhere('code', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(10);
        } else {
            $products = Product::latest()->paginate(6);
            $products->withPath('/auto-parts');
        }

        return view('shop.autoparts', compact('products', 'search'));
    }

    public function law()
    {
        return view('shop.law');
    }

    public function partners()
    {
        return view('shop.partners');
    }
}
