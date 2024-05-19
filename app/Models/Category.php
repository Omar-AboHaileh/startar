<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'ar_category_name',
    ];

    public function medicines(){
        return $this->hasMany(Medicine::class,'category_id','id')->OrderBy('popularity','DESC')->where('available',1);
    }
}
