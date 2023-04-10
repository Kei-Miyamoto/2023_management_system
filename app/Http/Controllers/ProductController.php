<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

// 各モデル追加
use App\Models\Product;
use App\Models\Company;
use App\Models\Sale;

class ProductController extends Controller
{
    protected $product;
    protected $company;
    protected $sale;

    public function __construct(Product $product, Company $company, Sale $sale)
    {
        $this->product = $product;
        $this->company = $company;
        $this->sale = $sale;
    }

    // 商品一覧
    public function showList(Request $request) {
        // productテーブルから全てのレコードを取得、5つ表示したら次のページへ
        $products = Product::with('company')->paginate(5);
        // dd($products);
        $companies = Company::all();
        // dd($companies);

        // ajaxを使ってjsonで返したい！！
        // $data = [
        //     'products' => $products,
        //     'companies' => $companies,
        // ];
        // return response()->json(
        //     [
        //         'products' => [
        //         'data' => $products->items(),
        //         'links' => $products->links()->toHtml()
        //         ],
        //         'companies' => $companies,
        //     ],
        //     200,[],
        // JSON_UNESCAPED_UNICODE
        // );

    // 同期処理で使っていたreturn部分
    return view('plist', compact('products', 'companies'));
    }
    

    // 商品検索
    public function search(Request $request) {
    $keyword = $request->input('keyword');
    $company_id = $request->input('company_id');
    // dd($keyword, $company_id);

    $query = Product::query();

    if ($keyword) {
        $query->where('product_name', 'LIKE', "%{$keyword}%");
    }

    if ($company_id) {
        $query->where('company_id', $company_id);
    }

    $products = $query->with('company')->paginate(5);
    $companies = Company::all();
    
    // ajaxを使ってjsonで返したい！！
    // return response()->json([
    //         'products' => $products,
    //         'companies' => $companies],
    //     200,[],
    //     JSON_UNESCAPED_UNICODE
    // );
    
    // 同期処理で使っていたreturn部分
    return view('plist', compact('products', 'companies'));

    }


    // 新規登録画面表示
    // 入力画面はただviewを返すだけ
    public function create(Request $request) {
        $products = Product::with('company')->get();
        $companies = Company::all();
        return view('pregist',compact('products', 'companies'));
    }


    public function store(Request $request)
{
    // 画像ファイルをアップロードする
    $validatedData = $request->validate([
        'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    if (!$request->hasFile('img_path')) {
        return redirect()->back()->withInput()->withErrors(['error' => config('messages.error')]);
    }
    // public/imgディレクトリに保存する
    $img_path = $request->file('img_path')->store('public/img');

    // 画像ファイルが保存されなかった場合はエラーを返す
    if (!$img_path) {
        return redirect()->back()->withInput()->withErrors(['error' => config('messages.error')]);
    }

    // 保存したファイルのパスを取得する
    $img_path = str_replace('public/', 'storage/', $img_path);

    // // `public`ディレクトリに保存されるため、シンボリックリンクを作成する
    // if ($img_path !== false) {
    //     $img_path = str_replace('public/', 'storage/', $img_path);
    // }

    // 商品情報を保存する
    $product = new Product;

    $product->product_name = $request->product_name;
    $product->price = $request->price;
    $product->stock = $request->stock;
    $product->img_path = $img_path;
    $product->company_id = $request->company_id;
    $product->save();

    return redirect('plist')->with('success', config('messages.success'));
}


    //商品の詳細情報
    public function detail($id) {
        // idを元にproduct情報取得
        $product = Product::find($id);
        return view('pdetail', compact('product'));
    }

    // 商品の編集
    public function edit($id) {
        $products = Product::with('company')->get();
        $companies = Company::all();
        $product = Product::find($id);
        return view('pedit',compact('product', 'companies'));
    }
    
    // 商品の更新処理
    public function update(Request $request, $id) {
        $product = Product::find($id);
        $companies = Company::all();
        $updateProduct = $product->updateProduct($request, $product, $companies);
        return redirect('plist');
    }

    // 商品の削除処理
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect('plist');
    }
}

