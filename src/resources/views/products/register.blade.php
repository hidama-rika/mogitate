@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
    <div class=register-main-container>
        <div class="register-container">
            <div class="section-title">
                <h2>商品登録</h2>
            </div>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="register-form">
                    <div class="form-group">
                        <label for="product_name">
                            商品名
                            <span class="required">必須</span>
                        </label>
                        <input type="text" id="product_name" name="name" value="{{ old('name') }}" placeholder="商品名を入力"/>
                        @error('name')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="product_price">
                            値段
                            <span class="required">必須</span>
                        </label>
                        <input type="text" id="product_price" name="price" value="{{ old('price') }}" placeholder="値段を入力" />
                        @error('price')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            商品画像
                            <span class="required">必須</span>
                        </label>
                        <div class="product__image-container">
                            {{-- 新規登録画面ではold()のみを使用 --}}
                            @if (old('image'))
                                <img id="image-preview" src="{{ asset(old('image')) }}" alt="選択された画像" />
                            @else
                                <img id="image-preview" src="" alt="" />
                            @endif
                            <div class="file-upload">
                                <label for="file-upload-button" class="file-upload-label">ファイルを選択</label>
                                <input id="file-upload-button" type="file" name="image" />
                                <span id="file-name" class="file-name">{{ old('image_name') }}</span>
                            </div>
                        </div>
                        @error('image')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            季節
                            <span class="required">必須</span>
                            <span class="optional">複数選択可</span>
                        </label>
                        <div class="season-options">
                            @foreach ($seasons as $season)
                            <label class="custom-checkbox-label">
                                <input type="checkbox" name="season[]" value="{{ $season->id }}"
                                    {{ in_array($season->id, old('season', [])) ? 'checked' : '' }}
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

                    <div class="form-group">
                        <label for="product_description">
                            商品説明
                            <span class="required">必須</span>
                        </label>
                        <textarea id="product_description" name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="buttons-container">
                        <button type="button" class="return-button" onclick="history.back()">戻る</button>
                        <button type="submit" class="register-button">登録</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<script>
    const fileInput = document.getElementById('file-upload-button');
    const fileNameSpan = document.getElementById('file-name');
    const imagePreview = document.getElementById('image-preview');

    fileInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const file = e.target.files[0];
            const fileName = file.name;
            const reader = new FileReader();

            fileNameSpan.textContent = fileName;

            // ファイルリーダーで画像を読み込み、プレビューに表示
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            }
            reader.readAsDataURL(file);

        } else {
            // ファイルが選択されていない場合、ファイル名を空にする
            fileNameSpan.textContent = '';
            imagePreview.src = "";
        }
    });

    // ページロード時に old データがあれば表示
    document.addEventListener('DOMContentLoaded', function() {
        // old('image_name')の値が空の場合、spanを空にする
        if (!fileNameSpan.textContent.trim()) {
            fileNameSpan.textContent = '';
        }
    });
</script>
@endsection