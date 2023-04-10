@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ml-3 w-75">
                    <div class="card-header">検索</div>
                    <div class="card-body">
                        {{-- 商品名とメーカー名の検索 --}}
                        {{-- 同期通信時のform --}}
                        {{-- <form id="search-form" action="{{ route('search') }}" method="GET"> --}}
                        {{-- 非同期通信時のform --}}
                        <form id="search-form">
                            @csrf
                            {{-- 商品名検索 --}}
                            <div class="form-group row">
                                <label for="product_name" class="col-sm-2 col-form-label">商品名</label>
                                <div class="col-sm-10">
                                    <input type="text" id="product_name" name="keyword" class="form-control"
                                        placeholder="商品名を入力してください">
                                </div>
                            </div>
                            {{-- メーカー名検索 --}}
                            <div class="form-group row">
                                <label for="company_id" class="col-sm-2 col-form-label">メーカー</label>
                                <div class="col-sm-10">
                                    <select name="company_id" id="company_id"
                                        class="form-control @if ($errors->has('company_id')) is-invalid @endif is-valid">
                                        <option value="" selected>メーカー名を選択してください</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- 検索ボタン --}}
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">検索</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- 新規登録ボタン --}}
                <div class="text-right">
                    <a class="btn btn-primary" href="{{ route('create') }}" role="button">新規登録</a>
                </div>
                {{-- 商品一覧テーブル --}}
                <div class="text-center">
                    <table class="table" id="plist-table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">商品画像</th>
                                <th scope="col">商品名</th>
                                <th scope="col">価格</th>
                                <th scope="col">在庫数</th>
                                <th scope="col">メーカー名</th>
                                <th scope="col">詳細</th>
                                <th scope="col">削除</th>
                            </tr>
                        </thead>
                        <tbody id="search-result">
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td><img src="{{ asset($product->img_path) }}" alt="{{ $product->product_name }}"
                                            width="50" height="50"></td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->company->company_name }}</td>
                                    <td><a href="{{ route('detail', ['id' => $product->id]) }}"><button type="submit"
                                                class="btn btn-info">詳細</button></a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('本当に削除しますか？')"
                                            action="{{ route('destroy', ['id' => $product->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $products->links() }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
