<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

}
