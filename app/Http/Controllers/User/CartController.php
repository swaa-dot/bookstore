<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected string $sessionKey = 'cart';

    public function index()
    {
        $items    = collect(session($this->sessionKey, []));
        $subtotal = $items->sum(fn($item) => $item['price'] * $item['qty']);

        return view('user.cart.index', compact('items', 'subtotal'));
    }

    public function add(Request $request, Book $book)
    {
        if ($book->stock <= 0) {
            return back()->with('error', "Stok '{$book->title}' habis.");
        }

        $cart = session($this->sessionKey, []);
        $id   = $book->id;
        $qty  = max(1, (int) $request->input('qty', 1));

        $currentQty = $cart[$id]['qty'] ?? 0;
        $newQty     = min($currentQty + $qty, $book->stock);

        $cart[$id] = [
            'id'     => $book->id,
            'title'  => $book->title,
            'author' => $book->author,
            'price'  => (float) $book->price,
            'image'  => $book->image,
            'stock'  => $book->stock,
            'qty'    => $newQty,
        ];

        session([$this->sessionKey => $cart]);

        return back()->with('success', "'{$book->title}' ditambahkan ke keranjang.");
    }

    public function update(Request $request, int $bookId)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $cart = session($this->sessionKey, []);

        if (isset($cart[$bookId])) {
            $qty = (int) $request->qty;
            $qty = max(1, min($qty, $cart[$bookId]['stock']));

            $cart[$bookId]['qty'] = $qty;
            session([$this->sessionKey => $cart]);
        }

        return back()->with('success', 'Keranjang diperbarui.');
    }

    public function remove(int $bookId)
    {
        $cart = session($this->sessionKey, []);
        unset($cart[$bookId]);
        session([$this->sessionKey => $cart]);

        return back()->with('success', 'Item dihapus dari keranjang.');
    }

    public function clear()
    {
        session()->forget($this->sessionKey);

        return back()->with('success', 'Keranjang dikosongkan.');
    }
}
