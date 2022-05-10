<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryproducts = CategoryProduct::orderby('created_at','desc')->paginate(3);
        return view('backend.categoryproduct.index')->with([
            'categoryproducts' => $categoryproducts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categoryproduct.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryproduct = new CategoryProduct();
        $categoryproduct->name=$request->get('name');
        $categoryproduct->slug=Str::slug($categoryproduct->name);
        $categoryproduct->user_id = Auth::user()->id;
        $categoryproduct->save();
        $request->session()->flash('success', 'Thêm mới thành công');
        return redirect()->route('backend.categoryproducts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryproduct = CategoryProduct::find($id);
        return view('backend.categoryproduct.edit')->with([
            'categoryproduct' => $categoryproduct
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoryproduct = CategoryProduct::find($id);
        $categoryproduct->name =$request->get('name');
        $categoryproduct->slug=Str::slug($request->get('name'));
        $categoryproduct->save();
        $request->session()->flash('success', 'Chỉnh sửa thành công');
        return redirect()->route('backend.categoryproducts.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryProduct::destroy($id);
        // $categoryproduct::destroy();
        return redirect()->route('backend.categoryproducts.index');
    }

    public function restore($id)
    {
        CategoryProduct::withTrashed()->where('id',$id)->restore();

        return redirect()->route('backend.categoryproducts.index');
    }

    public function delete(Request $request)
    {
        $categoryproductdeletes = CategoryProduct::onlyTrashed()->get();
        return view('backend.categoryproduct.delete')->with([
            'categoryproductdeletes'=> $categoryproductdeletes
        ]);
    }
}
