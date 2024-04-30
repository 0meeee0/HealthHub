<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    
    protected $fillable = ['name', 
    'email',
    'phone', 
    'address', 
    'productTitle', 
    'quantity', 
    'price', 
    'image', 
    'productId', 
    'userId'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
