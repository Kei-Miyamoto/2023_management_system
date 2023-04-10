<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Sale;
use HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;

class Company extends Model
{
    // productとのリレーション
    public function products() {
        return $this->hasMany(Product::class);
    }
}
