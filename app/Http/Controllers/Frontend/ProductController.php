<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function categoryproduct($id)
    {
        $categoryname = Category::find($id);
        $categoryproduct = Product::where('category_id',$id)->get();
        return view('frontend.products.categoryproduct')->with([
            'categoryproduct' => $categoryproduct,
            'categoryname' => $categoryname
        ]);
    }

    public function showProduct($id)
    {
        $show_product = Product::find($id);
        $products_recommended = Product::where('status',Product::STATUS_CONTINUE)->limit('3')->get();
        return view('frontend.products.show')->with([
            'show_product' => $show_product,
            'products_recommended' => $products_recommended
        ]);
    }
}
