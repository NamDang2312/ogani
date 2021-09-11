<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetail';
    protected $fillable = ['id','order_id','product_id','quantity','price'];
    const UPDATED_AT = null;
    const CREATED_AT = null; 
    public function product(){
        return $this->hasOne(product::class,'id','product_id'); 
    }
    public function order(){
        return $this->hasOne(order::class,'id','order_id');
    }
   

}
