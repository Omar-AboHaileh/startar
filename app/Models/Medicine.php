<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ar_name',
        'scientificName',
        'ar_scientificName',
        'brand',
        'ar_brand',
        'description',
        'ar_description',
        'quantity',
        'expirationDate',
        'price',
        'popularity',
        'image',
        'profit',
        'available',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    //returns the user that has added the medicine to the favorites
    public function favored()
    {
        return $this->belongsToMany(User::class, 'user_medicines', 'medicine_id', 'user_id')->withTimestamps();
    }
    //return the carts of the user that the medicine belongs to

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'user_medicine', 'medicine_id', 'order_id')->withPivot('quantity')->withTimestamps();
    }
}
