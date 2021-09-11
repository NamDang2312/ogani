<?php

namespace App\Models;
use App\Scopes\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name','status','prioty'];
    const UPDATED_AT = null;
    const CREATED_AT = null;
    
        protected static function booted()
        {
            # code...
            static::addGlobalScope(new Search);
        }

   public function Product()
   {
       return $this->hasMany(Product::class,'category_id', 'id');
   }
}
