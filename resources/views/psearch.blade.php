@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ml-3 w-75">
                    <div class="card-header">検索結果</div>
                    <div class="card-body">
                        {{-- 商品検索結果画面 --}}
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="id" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" name="id" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="product_name" class="col-sm-2 col-form-label">商品名</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_name" class="form-control">
                                </div>
                            </div>
                            <div class="selectbox row">
                                <label for="company_name" class="col-sm-2 col-form-label">メーカー</label>
                                <div class="col-sm-10">
                                    <select name="company_name" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">価格</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stock" class="col-sm-2 col-form-label">在庫数</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="stock">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="comment" class="col-sm-2 col-form-label">コメント</label>
                                <div class="col-sm-10">
                                    <textarea name="comment" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pict" class="col-sm-2 col-form-label">商品画像</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-file" name="pict">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- 戻るボタン --}}
                <div class="text-right">
                    <a class="btn btn-primary" href="{{ route('showList') }}" role="button">戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection
