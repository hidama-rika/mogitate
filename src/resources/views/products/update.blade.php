@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/update.css') }}" />
@endsection

@section('content')
    <div class="product-detail-container">
        <div class="product-detail__heading">
            <a href="/">商品一覧</a> > <span>{{ $product->name }}</span>
        </div>

        <form id="update-form" action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="product-detail">
                <div class="product-detail__image">
                    <div class="product__image-container">
                        @if (session()->has('errors') && is_string(old('image')))
                            {{-- バリデーションエラーでold()に文字列があれば表示 --}}
                            <img id="image-preview" src="{{ asset(old('image')) }}" alt="選択された画像" />
                        @elseif ($product->image)
                            {{-- 通常時、またはエラーでold()がなければ既存の画像を表示 --}}
                            <img id="image-preview" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
                        @else
                            <img id="image-preview" src="" alt="" />
                        @endif

                        <div class="file-upload">
                            <label for="file-upload-button" class="file-upload-label">ファイルを選択</label>
                            <input id="file-upload-button" type="file" name="image" />
                            <span id="file-name" class="file-name">
                                {{-- ファイル名を表示 --}}
                                @if(old('image') && is_string(old('image')))
                                    {{ basename(old('image')) }}
                                @elseif($product->image)
                                    {{ basename($product->image) }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="error-message-wrapper">
                        @error('image')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="product-detail__info">
                    <div class="form-group">
                        <label for="product_name">商品名</label>
                        <input type="text" id="product_name" name="name" value="{{ $product->name }}" />
                        @error('name')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_price">値段</label>
                        <input type="text" id="product_price" name="price" value="{{ $product->price }}" />
                        @error('price')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p class="form-label">季節</p>
                        <div class="season-options">
                            @foreach ($seasons as $season)
                                <label class="custom-checkbox-label">
                                    <input
                                        type="checkbox"
                                        name="season[]"
                                        value="{{ $season->id }}"
                                        {{ $product->seasons->contains($season->id) ? 'checked' : '' }}
                                    />
                                    <span class="custom-checkmark"></span>
                                    {{ $season->name }}
                                </label>
                            @endforeach
                        </div>
                        @error('season')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="product-detail__description-wrapper">
                <div class="form-group">
                    <label for="product_description">商品説明</label>
                    <textarea id="product_description" name="description">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="product-detail__buttons">
                <div class="button-group">
                    <a href="{{ route('products.index') }}" class="return-button">戻る</a>
                    <button type="submit" class="save-button" form="update-form">変更を保存</button>
                </div>

                <div class="delete-button-wrapper">
                    {{-- 削除フォームのボタンをここに直接配置 --}}
                    <button type="submit" class="delete-button" form="delete-form" onclick="return confirm('本当に削除してもよろしいですか？');">
                        <img src="{{ asset('storage/images/Frame 406.png') }}" alt="削除" />
                    </button>
                </div>
            </div>
        </form>

        {{-- 削除フォームを別の場所に配置 --}}
        <form id="delete-form" action="{{ route('products.destroy', $product) }}" method="POST">
            @csrf
            @method('DELETE')
        </form>
    </div>

@endsection