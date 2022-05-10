<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::find($id);
        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        Cart::add($product->id, $product->name, 1, $product->origin_price, 0, [
            'image' => $product->images[0]->image_url_full,
            'color' => 'red',
            'size' => $product->size
        ]);
        return redirect()->route('frontend.carts.index')->with('success','Thêm vào giỏ hàng thành công');
        // dd(1);
    }

    public function index()
    {
        $products = Cart::content();
        // dd($products);
        return view('frontend.carts.index')->with([
            'products' => $products,
        ]);
    }

    public function checkout()
    {
        $products = Cart::content();
        return view('frontend.carts.checkout')->with([
            'products'=>$products,
        ]);
    }
}
