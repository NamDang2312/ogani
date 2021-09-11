<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use App\Models\account;
use App\Models\order;
use App\Models\orderdetail;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Cookie;

class Homecontroller extends Controller
{
    
    public function index()
    {
        // dd(request() -> cookie('name'));
        $name =  request() -> cookie('name');
        $categories = Category::orderBy("name") -> get();
        $products = product::all();
        // dd(getType($products));
        return view('homepage', compact('categories', 'products'))->with('name');
        # code...
    }
    public function featured()
    {
        $categories = Category::orderBy("name") -> get();
        $search = request() -> term;
        // dd($search);
        $products = product::select('id','name','image','price','sale_price')->where('name',"LIKE","%$search%") -> get();
        // dd($products);
        // dd(getType($categories));
        $arrayoutput = array();
        if($products -> count() > 0){
            foreach ($products as $product) {
                $temp_array = array();
                $productprice = number_format(intval($product->price) - round(intval($product->price) * intval($product->sale_price) / 100, -3), 0, '', '.') ;
                // dd($product ->price);
                $temp_array['label'] = '<img src="http://localhost:81/Helloword/uploads/'.$product -> image.'" width="70" />&nbsp;&nbsp;&nbsp;'.$product ->name.'&nbsp;&nbsp;&nbsp;'.$productprice.' đ';
                $temp_array['name'] = route('home.showproduct',$product -> id);
                $temp_array['value'] = $product -> name; 
                $arrayoutput[] = $temp_array;
            }
        }else{
            $arrayoutput['value'] = '';
            $arrayoutput['label'] = 'No Record Found';
        }
        
        // dd($arrayoutput);
        // $arrayCookie = json_decode($product, true);
        return $arrayoutput;
    }
    public function shop()
    { $products = product::all();
        $categories = Category::orderBy("name") -> get();
        return view('shop',compact('categories', 'products'));
       
    }
    public function login()
    {
        return view('login');
    }
    public function checkout()
    {
        $cart = request() -> cookie('shopping-cart');
       
        // dd($orders);
        
        // Cover to array
        $arrayCookie = json_decode($cart, true);
        // $arrayOrder = json_decode($orders,true);
        // $arraynew = array();
        // foreach($arrayOrder as $Order){
        //     $orderdetail =  orderdetail::where('order_id',$Order['id'])->get()->toArray();
             
        //     array_push($arraynew,$orderdetail);
        // }

        // dd($arraynew);
        return view('checkout', compact('arrayCookie'));
    }
    public function addcart($id)
    {   
        $quantity = request() -> quantity;
        // dd(getType($quantity));

      
            $product = product::find($id);
            $cart = request() -> cookie('shopping-cart');
           
            // Cover to array
            $arrayCookie = json_decode($cart, true);
            // dd($arrayCookie);
            // dd( array_search($product -> name, array_column($arrayCookie, 'name')));
            if ($quantity == null) {
                if (isset($arrayCookie[$id])) {
                    $arrayCookie[$id]["quantity"] = $arrayCookie[$id]["quantity"] + 1;
                } else {
                    $arrayCookie[$id] = [
                    'id' => $id,
                    'name' => $product -> name
                    ,'image' => $product -> image
                    ,'price' => $product -> price
                    ,'sale_price' => $product -> sale_price
                    ,'quantity'=> 1 ];
                }
            }else{
                if (isset($arrayCookie[$id])) {
                    $arrayCookie[$id]["quantity"] = $arrayCookie[$id]["quantity"] + intval($quantity);
                } else {
                    $arrayCookie[$id] = [
                    'id' => $id,
                    'name' => $product -> name
                    ,'image' => $product -> image
                    ,'price' => $product -> price
                    ,'sale_price' => $product -> sale_price
                    ,'quantity'=> intval($quantity) ];
                }
            }
            $day =  1;
            $time = $day * 60 * 60 * 24 ;
            $array_json=json_encode($arrayCookie);
            $cookieshoppingcart =  cookie('shopping-cart', $array_json, $time);
            return response() -> json(['code' => 200,'message' => 'Product added successfully'], 200) -> withCookie($cookieshoppingcart);
        
       
    }
    public function logout()
    {
        $cookie = \Cookie::forget('name');
        return redirect() -> route('home.index') -> withCookie($cookie);
    }

    public function logged(Request $request)
    {
        //  dd($account = DB::table('account')->where('name','nam')->value('password'));
        $account = account::where('name', $request->name)->where('password', $request->password)->first();
        //    dd($account -> name);
        if ($account != null || $request -> name == '') {
            $day =  1;
            $time = $day * 60 * 60 * 24 ;
            $cookiename = cookie('name', $request -> name, $time);
            $cookiepassword = cookie('password', $account -> id, $time);
            return redirect() -> route("home.index") -> withCookie($cookiename)  -> withCookie($cookiepassword);
        // response()->json(['success' => 'Login success', 'name' => $account->name])-> withCookie($cookiename)  -> withCookie($cookiepassword);
        } else {
            return response()->json(['error' => 'Error msg'], 404);
        }
    }
    public function add_order(Request $request)
    {
        if (request() -> cookie('name') == null) {
            return response() -> json(['code' => "403",'route' => 'login']);
        } else {    
              // cookie password la id do tao nham o ham logged
        $id_account =  request() -> cookie('password');
        $account = account::find($id_account);
        $data = array();
        $cart = request() -> cookie('shopping-cart');
        $arrayCookie = json_decode($cart, true);
        // dd($arrayCookie);
        $total = 0;
        
        foreach ($arrayCookie as $product) {
            $total += intval($product['quantity']) * intval($product['price']);
        }
        if ($request -> name && $request -> phone && $request -> address) {
            $data['name'] = $request -> name;
            $data['phone'] = $request -> phone;
            $data['total'] = $total;
            $data['address'] = $request -> address;
            $data['note'] = $request -> note;
            $data['account_id'] = $id_account;

            $data['STATUS'] = 1;
        } else {
            $data['name'] = $account -> name ;
            $data['phone'] = $account ->  phone;
            $data['total'] = $total;
            $data['address'] = $account -> address ;
            $data['account_id'] = $id_account;
            $data['STATUS'] = 1;
        }
        $id_order = order::insertGetId($data);
        //    dd($id_order);
      
        $orderdetail_data = array();
        //    dd($arrayCookie);
        foreach ($arrayCookie as $product) {
            $orderdetail_data['order_id'] = $id_order;
            $orderdetail_data['quantity'] = $product['quantity'] ;
            $orderdetail_data['product_id'] = $product['id'] ;
            $orderdetail_data['price'] = $product['price'] ;
            orderdetail::create($orderdetail_data);
        }
        $cookieshoppingcart = \Cookie::forget('shopping-cart');
        $viewShoppingCart =  view('component.shoppingcart', compact('arrayCookie'))->render();
        return response() -> json(['code' => '200','success'=> "Order has been sent to the store, waiting for confirmation from the store",'viewShoppingCart' => $viewShoppingCart])-> withCookie($cookieshoppingcart);
   
        }

       }
    public function deleteCard()
    {
        $cookieshoppingcart = \Cookie::forget('shopping-cart');
        $cart = request() -> cookie('shopping-cart');
        $arrayCookie = json_decode($cart, true);
        $cartView = view('component.shoppingcart', compact('arrayCookie'))->render();
        // Cookie::queue(Cookie::forget('shopping-cart'));
        // dd($cart);
        // return redirect() -> route('home.checkout') -> withCookie($cookieshoppingcart);
        return  response()->json(['code' => "200",'viewShoppingCart' => $cartView], 200) -> withCookie($cookieshoppingcart) ;
    }

    public function updatecart(Request $request)
    {
        $product = product::find($request -> id);
        $cart = request() -> cookie('shopping-cart');
       
        // Cover to array
        $arrayCookie = json_decode($cart, true);
        $arrayCookie[$request -> id] = [
                'id' => $request -> id
                ,'name' => $product -> name
                ,'image' => $product -> image
                ,'price' => $product -> price
                ,'sale_price' => $product -> sale_price
                ,'quantity'=> $request -> quantity ];
        $day =  1;
        $time = $day * 60 * 60 * 24 ;
        $array_json=json_encode($arrayCookie);
        $cookieshoppingcart =  cookie('shopping-cart', $array_json, $time);
        
        return response() -> json(['code' => 200,'message' => 'add success'], 200) -> withCookie($cookieshoppingcart);
    }
    public function deleteEachCart(Request $request)
    {
        $cart  = request() -> cookie('shopping-cart');
        $arrayCookie = json_decode($cart, true);
        unset($arrayCookie[$request -> id]);
        // dd($arrayCookie);
        if (count($arrayCookie) == 0) {
            $cookieshoppingcart = \Cookie::forget('shopping-cart');
        } else {
            $day =  1;
            $time = $day * 60 * 60 * 24 ;
            $array_json=json_encode($arrayCookie);
            $cookieshoppingcart =  cookie('shopping-cart', $array_json, $time);
        }
        // dd($arrayCookie);
        $viewShoppingCart =  view('component.shoppingcart', compact('arrayCookie'))->render();
        return response() -> json(['code' => 200,'viewShoppingCart' => $viewShoppingCart], 200) -> withCookie($cookieshoppingcart);
        ;
    }
    public function orderList()
    {
        $orders = order::where('account_id',request()->cookie('password'))->get()->sortByDesc('id');
        // dd($orders);
        return view('listorder',compact('orders'));
    }
    public function cancelorder()
    {
        $order = order::findOrFail(request()->id);
        if($order){
            $order -> STATUS = 0;
            $order->save();
        }
        return response() -> json(['success'=> 'Your order has been cancelled']);
    }
    public function re_order()
    {
        $order = order::findOrFail(request()->id);
        if($order){
            $order -> STATUS = 1;
            $order->save();
        }
        return response() -> json(['success'=> 'Your order has been re-order']);
    }
    public function categorydetail($id)
    {
        $category = category::findOrFail($id);
        $categories = category::all();
        return view('categorydetail',compact('category','categories'));

    }
    public function showproduct($id)        
    {
        $product = product::findOrFail($id);
        $caer =  round($product->price * $product->sale_price / 100,-3);
        
        $cat = round($product->price - $product->price * $product->sale_price / 100, -3);
        // dd($cat);
        $view =  view('component.product-detail',compact('product')) -> render();
        $array = json_decode($product -> image_list, true);
        // dd($array);
        // dd(explode(",",$array['image_list'])  );
        return response() -> json(['code' => '200','view' => $view],200);
    }
}
