<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ProductController;

class Product extends Model
{
    // use HasFactory;
    // モデルに関連づけるテーブル
    protected $table = "products";
    // テーブルに関連づける主キー
    protected $primaryKey = 'id';
    // 登録・変更可能なカラム
    protected $fillable = [
        'company_id','product_name',
        'price','stock','comment','img_path'
    ];

    // companyとのリレーション
    public function company() {
        return $this->belongsTo(Company::class);
    }
    // 一覧画面のためにproducts&companyテーブルから全てのデータ取得
    public function findAllProducts() {
        return Product::all();
    }
    public function findAllCompanies() {
        return Company::all();
    }

    public function InsertProduct($request) {
        return $this->create([
            'product_name' => $request->product_name,
            'company_name' => $request->company->company_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'comment' => $request->comment,
            'img_path' => $request->img_path
        ]);
    }
// 更新処理
    public function updateProduct($request, $product, $companies) {
        $img_path = $request->img_path ?? '';
        $result = $product->fill([
            'product_name' => $request->product_name,
            'company_name' => $companies->find($request->company_name)->company_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'comment' => $request->comment,
            'img_path' => $request->img_path
        ])->save();
        return $this->belongsTo(Company::class);
        return $result;
    }

}
