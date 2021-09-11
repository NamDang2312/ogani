<?php

namespace App\Http\Controllers;

use App\Models\orderdetail;
use Illuminate\Http\Request;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = orderdetail::all();
    //    dd($data);
    // data la collection
        return view('admin.orderdetail.index',compact('data'));

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
     * @param  \App\Models\orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function show(orderdetail $orderdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function edit(orderdetail $orderdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orderdetail $orderdetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(orderdetail $orderdetail)
    {
        //
    }
}
