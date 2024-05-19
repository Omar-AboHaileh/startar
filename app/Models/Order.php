<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bill',
        'status',
        'payed',
        'profit'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->first();
    }
    //returns the medicines that are listed in the cart which the user sent
    //with pivot fetch the other columns in pivot tables
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'order_medicines', 'order_id', 'medicine_id')->withPivot('quantity','price','expirationDate','profit')->withTimestamps();
    }
}
