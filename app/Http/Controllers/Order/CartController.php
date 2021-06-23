<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request)
    {
        $duplicates = Cart::search(function($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Товар уже есть в вашей корзинею Для того, чтобы изменить количество, перейдите в корзину');
        }

        Cart::add(
            $request->id,
            $request->name,
            1,
            $request->price
        )
            ->associate('App\Models\Product');

        return redirect()
            ->route('cart.index')
            ->with('success', 'Товар успешно добавлен в вашу корзину');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'Количество не должно превышать остаток на складе');
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);

        session()->flash('success', 'Количество товара успешно обновлено');
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success', 'Товар был успешно удален из корзины');
    }
}
