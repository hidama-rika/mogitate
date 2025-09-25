@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <div class="product-list-container">
        <div class="product-list__heading">
            <div class="section-title">
                <h2>商品一覧</h2>
            </div>
            <div class="add-button">
                <a href="{{ route('products.register') }}" class="add-button__link">+ 商品を追加</a>
            </div>
        </div>
        {{-- メインコンテンツのコンテナ --}}
        <div class="main-content-container">
            <div class="product-search-sort">
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="product-search">
                        <input type="text" name="keyword" placeholder="商品名で検索" />
                        <button class="search-button" type="submit">検索</button>
                    </div>
                </form>
                <div class="product-sort">
                    <p>価格順で表示</p>
                    <form id="sort-form" action="{{ route('products.index') }}" method="GET">
                        <select name="sort" onchange="document.getElementById('sort-form').submit()">
                            <option value="">価格で並べ替え</option>
                            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>低い順に表示</option>
                            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>高い順に表示</option>
                        </select>
                    </form>
                    <div class="sort-tags">
                        @if(request('sort') == 'asc')
                            <div class="sort-tag-container">
                                <span class="sort-tag-text">低い順に表示</span>
                                <a href="{{ route('products.index', ['sort' => null, 'keyword' => request('keyword')]) }}" class="reset-sort">×</a>
                            </div>
                        @elseif(request('sort') == 'desc')
                            <div class="sort-tag-container">
                                <span class="sort-tag-text">高い順に表示</span>
                                <a href="{{ route('products.index', ['sort' => null, 'keyword' => request('keyword')]) }}" class="reset-sort">×</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="product-grid-container">
                <ul class="product-grid">
                    @foreach ($products as $product)
                    <li class="product-item">
                        <a href="{{ route('products.show', ['id' => $product->id]) }}">
                            <div class="product-item__image">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
                            <div class="product-item__content">
                                <div class="product-item__name">{{ $product->name }}</div>
                                <div class="product-item__price">¥{{ $product->price }}</div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="pagination-container">
                    {{ $products->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection