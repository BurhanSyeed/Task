<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $fillable = ['name','price'];
    protected $table = "products";
    protected $primaryKey = "id";
}
