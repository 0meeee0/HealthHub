<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    
    protected $fillable = ['name', 
    'email', 
    'user_id', 
    'product_name', 
    'quantity', 
    'price', 
    'image', 
    'product_id', 
    'payment_status', 
    'delivery_status'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
