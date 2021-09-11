<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable =  ['name','status','phone','account_id','email','note','address'];
    const UPDATED_AT = null;
    const CREATED_AT = null; 
    public function account(){
        return $this -> hasOne(account::class,'id','account_id');
    }
    public function orderdetails()
    {
        return $this -> hasMany(orderdetail::class,'order_id','id');
    }
}
