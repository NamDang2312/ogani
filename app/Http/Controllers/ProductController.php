<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\product\StoreRequestProduct;
use App\Http\Requests\product\EditRequestProduct;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = product::orderBy('name') ->get();     
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::orderBy('name')->get();
        return view('admin.product.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestProduct $request)
    {
        product::create($request->all());
        return redirect()->route('product.index')->with('success', 'Add Product Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $data = Category::all();
        return view('admin.product.edit', compact('product', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        // dd($request);
        $product->update($request->only('name', 'description', 'image', 'image_list', 'sale_price', 'category_id', 'STATUS', 'price'));
        return redirect()->route('product.index')->with('success', 'Update Product Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        if($product -> orderdetails -> count() == 0){
            $product->delete();
            return redirect()->route('product.index') -> with('success','Delete Success');
        }else{
            return redirect()->route('product.index') -> with('danger','The product cannot be deleted because it is already in the order');
        }
        
    }
}
