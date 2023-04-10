@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ml-3 w-75">
                    <div class="card-header">商品編集</div>
                    <div class="card-body">
                        {{-- 商品編集画面 --}}
                        <form action="{{ route('update', $product->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="id" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">{{ $product->id }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="product_name" class="col-sm-2 col-form-label">商品名</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_name" class="form-control"
                                        value="{{ old('product_name', $product->product_name) }}">
                                </div>
                            </div>
                            <div class="selectbox row">
                                <label for="company_name" class="col-sm-2 col-form-label">メーカー</label>
                                <div class="col-sm-10">
                                    <select name="company_name" class="form-control">
                                        <option value="" selected>メーカー名を選択してください</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}"
                                                {{ old('company_name', $company->company_name ?? '') == optional($product->company)->company_name }}
                                                selected>
                                                {{ optional($product->company)->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">価格</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="price"
                                        value="{{ old('price', $product->price) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stock" class="col-sm-2 col-form-label">在庫数</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="stock"
                                        value="{{ old('stock', $product->stock) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="comment" class="col-sm-2 col-form-label">コメント</label>
                                <div class="col-sm-10">
                                    <textarea name="comment" class="form-control">{{ old('comment', $product->comment) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="img_path" class="col-sm-2 col-form-label">商品画像</label>
                                <div class="col-sm-10">
                                    <input type="file"
                                        class="custom-file-file{{ $errors->has('img_path') ? ' is-invalid' : '' }}"
                                        name="img_path" value="{{ old('img_path', $product->img_path) }}">
                                    @if ($errors->has('img_path'))
                                        <div class="invalid-feedback">{{ $errors->first('img_path') }}</div>
                                    @endif
                                </div>
                            </div>
                            {{-- 更新ボタン --}}
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">更新</button>
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
