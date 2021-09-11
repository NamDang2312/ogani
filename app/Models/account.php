<?php

namespace App\Models;
use App\Scopes\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    use HasFactory;
    protected $table = 'account';
    protected $fillable = ['name','status','phone','password','email','role','address'];
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected static function booted()
    {
        static::addGlobalScope(new Search);
    }
    public function orders(){
        return $this -> hasMany(order::class,'account_id','id');
       
    }
}
