<?php

namespace App\Http\Controllers;

use App\Models\orderdetail;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = order::all() ->sortByDesc('id');
        // dd($data);

        return view('admin.order.index', compact('data'));
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
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        $arrayorderdetail = orderdetail::where('order_id', $order->id) -> get()->toArray();
        // $product = product::whereId($arrayorderdetail[0]['product_id'])-> get()->get(0)->name;
        // dd($product);
        $products = array();
        foreach ($arrayorderdetail as $item) { 
           
            // dd( product::whereId($item['product_id'])-> get()->get(0)->name);
            
            $image =  product::whereId($item['product_id'])-> get()->get(0)->image;      

            $name = product::whereId($item['product_id'])-> get()->get(0)->name;   
             array_push($products, array('quantity'=>$item['quantity'],'image' => $image,'name' => $name,'price' => $item['price']));
        }
        // dd($products);
    
        $showorderString = json_encode($products);

    

       $ve = view('component.order',compact('showorderString')) -> render();
        return response() -> json(['view' => $ve]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        // order::where('id',)-> update('STATUS',2);
        $order = order::findOrFail($order->id);
// Make sure you've got the Page model
if($order) {
    $order->STATUS = 2;
    $order->save();
}

        return response()-> json(["success"=> "Order has been confirmed"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
