<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    use HasFactory;

    protected $fillable = ['price' , 'quantity' , 'product_id' , 'order_id'];

    public function order()
    {
        return $this-> belongsTo(Order::class);
    }
}
