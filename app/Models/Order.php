<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =['price','quantity','user_id','product_id','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
       return $this->belongsTo(Product::class);
    }

}
