@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ml-3 w-75">
                    <div class="card-header">新規登録</div>
                    <div class="card-body">
                        {{-- productの新規登録 --}}
                        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- 商品名入力 --}}
                            <div class="form-group row">
                                <label for="product_name" class="col-sm-2 col-form-label">商品名<span
                                        class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_name" class="form-control"
                                        value="{{ old('product_name') }}" placeholder="商品名を入力してください"
                                        @if ($errors->has('product_name')) is-invalid @endif is-valid>
                                    @if ($errors->has('product_name'))
                                        <div class="invalid-feedback">{{ $errors->first('product_name') }}</div>
                                    @else
                                        <div class="invalid-feedback">必須項目です</div>
                                    @endif
                                </div>
                            </div>
                            {{-- メーカー名選択 --}}
                            <div class="form-group row">
                                <label for="company_id" class="col-sm-2 col-form-label">メーカー<span
                                        class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                                <div class="col-sm-10">
                                    <select name="company_id" id="company_id"
                                        class="form-control @if ($errors->has('company_id')) is-invalid @endif is-valid">
                                        <option value="" selected>メーカー名を選択してください</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_id'))
                                        <div class="invalid-feedback">{{ $errors->first('company_id') }}</div>
                                    @else
                                        <div class="invalid-feedback">必須項目です</div>
                                    @endif
                                </div>
                            </div>
                            {{-- 価格入力 --}}
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">価格<span
                                        class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="価格を入力してください"
                                        value="{{ old('price') }}" @if ($errors->has('price')) is-invalid @endif
                                        is-valid name="price">
                                    @if ($errors->has('price'))
                                        <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                    @else
                                        <div class="invalid-feedback">必須項目です</div>
                                    @endif
                                </div>
                            </div>
                            {{-- 在庫数入力 --}}
                            <div class="form-group row">
                                <label for="stock" class="col-sm-2 col-form-label">在庫数<span
                                        class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="在庫数を入力してください"
                                        value="{{ old('stock') }}" @if ($errors->has('stock')) is-invalid @endif
                                        is-valid name="stock">
                                    @if ($errors->has('stock'))
                                        <div class="invalid-feedback">{{ $errors->first('stock') }}</div>
                                    @else
                                        <div class="invalid-feedback">必須項目です</div>
                                    @endif
                                </div>
                            </div>
                            {{-- コメント入力 --}}
                            <div class="form-group row">
                                <label for="comment" class="col-sm-2 col-form-label">コメント</label>
                                <div class="col-sm-10">
                                    <textarea name="comment" class="form-control">{{ old('comment') }}</textarea>
                                </div>
                            </div>
                            {{-- 商品画像入力 --}}
                            <div class="form-group row">
                                <label for="img_path" class="col-sm-2 col-form-label">商品画像</label>
                                <div class="col-sm-10">
                                    <input type="file" value="{{ old('img_path') }}"
                                        class="custom-file-file{{ $errors->has('img_path') ? ' is-invalid' : '' }}"
                                        id="img_path" name="img_path">
                                    @if ($errors->has('img_path'))
                                        <div class="invalid-feedback">{{ $errors->first('img_path') }}</div>
                                    @endif
                                </div>
                            </div>


                            {{-- 登録ボタン --}}
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">登録</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- 戻るボタン --}}
                <div class="text-right">
                    <a class="btn btn-primary" href="{{ route('showList') }}" role="button">一覧画面へ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
