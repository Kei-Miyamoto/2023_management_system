<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use HasFactory;
use App\Http\Controllers\ProductController;

// use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    // productとのリレーション
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
