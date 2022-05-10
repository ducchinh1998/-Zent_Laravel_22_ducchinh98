<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::orderBy('created_at','desc')->paginate(10);
        if ($request->sortby == 'default') {
            return view('backend.orders.index')->with(compact('orders'));
        }
        if ($request->sortby)
        {
            $sortby = $request->sortby;
            switch ($sortby) {
                case 'moi-nhat':
                    $orders = Order::orderBy('created_at','desc');
                    break;
                case 'sp-cu':
                    $orders = Order::orderBy('created_at','asc');
                    break;
                case 'tang-dan':
                    $orders = Order::orderBy('id','asc');
                    break;
                case 'giam-dan':
                    $orders = Order::orderBy('id','desc');
                    break;

                default:
                $orders = Order::orderBy('created_at','desc');

            }
            $orders = $orders->paginate(10);
        }
        return view('backend.orders.index')->with(compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderstt = Order::find($id);
        return view('backend.orders.show')->with(['orderstt' => $orderstt]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
