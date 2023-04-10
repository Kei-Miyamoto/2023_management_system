@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ml-3 w-75">
                    <div class="card-header">詳細画面</div>
                    <div class="card-body">
                        {{-- 商品詳細画面 --}}
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="id" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">{{ $product->id }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pict" class="col-sm-2 col-form-label">商品画像</label>
                                <div class="col-sm-10"><img src="{{ asset($product->img_path) }}"
                                        alt="{{ $product->product_name }}" width="50" height="50">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="product_name" class="col-sm-2 col-form-label">商品名</label>
                                <div class="col-sm-10">{{ $product->product_name }}
                                </div>
                            </div>
                            <div class="selectbox row">
                                <label for="company_name" class="col-sm-2 col-form-label">メーカー</label>
                                <div class="col-sm-10">{{ $product->company->company_name }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">価格</label>
                                <div class="col-sm-10">{{ $product->price }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stock" class="col-sm-2 col-form-label">在庫数</label>
                                <div class="col-sm-10">{{ $product->stock }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="comment" class="col-sm-2 col-form-label">コメント</label>
                                <div class="col-sm-10">{{ $product->comment }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    {{-- 戻るボタン --}}
                    <a class="btn btn-primary" href="{{ route('showList') }}" role="button">戻る</a>
                    {{-- 編集ボタン --}}
                    <a class="btn btn-primary" href="{{ route('edit', $product->id) }}" role="button">編集</a>
                </div>
            </div>
        </div>
    </div>
@endsection
