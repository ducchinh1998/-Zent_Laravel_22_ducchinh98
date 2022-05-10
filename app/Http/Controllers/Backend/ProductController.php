<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Brand;
use App\Models\CategoryProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderby('created_at','desc')->paginate(4);
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.products.index',['products' => $products,'categories' => $categories,'brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_products = CategoryProduct::all();
        $brands = Brand::all();
        return view('backend.products.create')->with([
            'category_products' => $category_products,
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name')).rand(0,999);
        $product->category_id = $request->get('category_product');
        $product->brand_id = $request->get('brand_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        $product->quantity = $request->get('quantity');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $product->created_at = Carbon::now();
        $product->save();

            if($request->hasFile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $name = $file->getClientOriginalName().rand(0,999);
                    $disk_name = 'public';

                    $path = Storage::disk($disk_name)->putFileAs('images',$file,$name);

                    $image = new Image();
                    $image->name = $name;
                    $image->disk = $disk_name;
                    $image->path = $path;
                    $image->product_id = $product->id;

                    $image->save();

                }

            }

            if($product->save()){
                 return redirect()->route('backend.products.index')->with("success",'Thêm mới sản phẩm thành công');
            }else{
                return redirect()->route('backend.products.index')->with("error",'Thêm mới sản phẩm thất bại');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    public function showImages($id)
    {
        $images = Product::find($id)->images;
         return view('backend.products.showImages')->with(['images' => $images]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_products = CategoryProduct::all();
        $product = Product::find($id);
        $images = Image::find($product);
        $brands = Brand::all();

        return view('backend.products.edit')->with([
            'category_products' => $category_products,
            'product' => $product,
            'images' => $images,
            'brands' => $brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id);

        // $product->update($data);
        $product->name = $request->get('name');
        //$product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_product');
        $product->brand_id = $request->get('brand_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->quantity = $request->get('quantity');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $product->save();


        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach($files as $file){
                $name = $file->getClientOriginalName().rand(0,999);
                $disk_name = 'public';

                $path = Storage::disk($disk_name)->putFileAs('images',$file,$name);

                $image = new Image();
                $image->name = $name;
                $image->disk = $disk_name;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
                    // dd($image);
            }

        }
        $delimg = $request->get('delimg');
        if(!empty($delimg)){
            foreach($delimg as $del){
                $imgdelete = Image::find($del);
                Storage::disk('public')->delete($imgdelete->path);
                $imgdelete->delete();
            }
        }
        // $this->authorize('update',Product::class);
        if($product->save()){
            return redirect()->route('backend.products.index')->with("updatesuccess",'Chỉnh sửa sản phẩm thành công');
       }else{
           return redirect()->route('backend.products.index')->with("updateerror",'Chỉnh sửa sản phẩm thất bại');
       }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $image = Image::where('product_id',$product->id)->delete();
        if( $product->delete()){
            return redirect()->route('backend.products.index')->with("deletesuccess",'Xóa sản phẩm thành công');
        }else{
           return redirect()->route('backend.products.index')->with("deleteerror",'Xóa sản phẩm thất bại');
    }
}
}
