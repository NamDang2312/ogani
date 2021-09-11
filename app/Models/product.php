<?php

namespace App\Models;

use App\Scopes\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name', 'image', 'price', 'description', 'image_list', 'STATUS', 'sale_price', 'category_id'
    ];
    const UPDATED_AT = null;
    const CREATED_AT = null;

    // protected static function booted()
    // {
    //     # code...
    //     static::addGlobalScope(new Search);
    // }
    public function scopeSe($query)
    {
        if($key = request() -> txt)
        {
            $query = $query -> where('name','like','%'.$key.'%');
        }
        return $query;
        # code...
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function orderdetails()
    {
        return $this -> hasMany(orderdetail::class,'product_id','id');
    }

}
