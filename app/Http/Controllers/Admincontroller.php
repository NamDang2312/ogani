<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\order;
use App\Models\account;
class AdminController extends Controller   
{
    public function dashboard() 
    {
        $totalAll = order::sum('total');
        // dd($totalALl);
        $order_sales = order::where('STATUS',2) -> count();
        $totalProducts = product::all() -> count();
        $totalAccount = account::all() -> count();
         // dd($order_sales);
        $results = DB::table('orderdetail')->select(DB::raw('product_id,sum(quantity) as quantity  '))->join('order','orderdetail.order_id','=','order.id')->where('order.STATUS',2)-> groupBy('orderdetail.product_id')->get() -> take(10);
        $products = array();
        foreach($results as $result){
            $product = product::findOrFail($result -> product_id);
            $product ->sold = $result -> quantity;         
            // dd($product -> quantity);
           if($product->sale_price > 0){
            $products[] = $product;
           }
          
        }
        // dd($products);
       
        return view('admin.dashboard',compact('products','totalAll','order_sales','totalProducts','totalAccount'));
    }
    public function file()
    {
        return view('admin.file');
    }
    public function bestSellingProducts(){
        $results = DB::table('orderdetail')->select(DB::raw('product_id,sum(quantity) as quantity  '))-> join('order','orderdetail.order_id','=','order.id')->where('STATUS',2)-> groupBy('product_id')->get() -> take(10);
        // dd($results);
        $array = array();
        foreach($results as $result){        
            $app = app();   
            $object = $app->make('stdClass');
            // dd($laravel_object);   
            $product = product::findOrFail($result -> product_id);
           
            $object -> name = $product -> name;
            $object -> y =intval($result -> quantity) ;
            $array[] = $object;
            
        }
        // dd($array);
        return $array;
    }

 
}
