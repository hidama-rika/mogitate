<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // リクエストからキーワードとソート条件を取得
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');

        // ベースとなるクエリを準備
        $query = Product::query();

        // キーワードがあれば部分一致で商品を絞り込む
        if ($keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        // ソート条件があれば価格で並び替える
        if ($sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'desc') {
            $query->orderBy('price', 'desc');
        }

        // ページネーションを適用
        $products = $query->paginate(6);

        // ページネーションリンクに検索・ソート条件を引き継ぐ
        $products->appends(['keyword' => $keyword, 'sort' => $sort]);

        // 取得したデータをproducts.indexビューに渡す
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        // 指定されたIDの商品をデータベースから取得し、紐付いている季節データをロード
        $product = Product::with('seasons')->findOrFail($id);

        // すべての季節データを取得
        $seasons = Season::all();

        // 取得したデータを商品詳細ビューに渡す
        return view('products.update', compact('product', 'seasons'));
    }

    public function register()
    {
        // すべての季節データを取得
        $seasons = Season::all();

        // $product変数をnullとしてビューに渡す
        // compact関数を使って$seasonsと$productを渡す
        $product = null;

        return view('products.register', compact('product', 'seasons'));
    }

    public function store(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        // imagePathの初期化
        $imagePath = null;

        if ($request->hasFile('image')) {
            $originalFileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/fruits-img', $originalFileName);
            $imagePath = 'images/fruits-img/' . $originalFileName;
        }

        $product = Product::create([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'image' => $imagePath, // ここで$imagePathを渡す
            'description' => $validatedData['description'],
        ]);

        // 季節の紐付け
        if (isset($validatedData['season'])) {
            $product->seasons()->sync($validatedData['season']);
        }

        return redirect()->route('products.index')->with('success', '商品を登録しました');
    }

    public function update(UpdateRequest $request, Product $product)
    {

        // フォームからの全データを取得
        $allData = $request->all();

        // 画像の処理
        if ($request->hasFile('image')) {
            // 新しい画像を元のファイル名で保存
            $originalFileName = $request->file('image')->getClientOriginalName();
            $newImagePath = $request->file('image')->storeAs('public/images/fruits-img', $originalFileName);

            // 既存の画像ファイルが存在すれば削除
            if ($product->image) {
                $oldImagePath = 'public/' . $product->image;
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
            }

            // データベースに保存するパスを更新
            $allData['image'] = str_replace('public/', '', $newImagePath);
        }

        // 商品情報の更新
        $product->update($allData);

        // 季節の紐付けを更新
        // 季節データが送信されない場合は空の配列でsyncし、紐付けを全て解除する
        $seasons = $allData['season'] ?? [];
        $product->seasons()->sync($seasons);

        // 商品一覧画面へリダイレクト
        return redirect()->route('products.index')->with('success', '商品情報を更新しました');
    }

    public function destroy(Product $product)
    {
        // 既存の画像ファイルが存在する場合、削除
        if ($product->image) {
            // 'images/fruits-img/'から始まるパスを'public/images/fruits-img/'に変換
            $oldImagePath = 'public/' . $product->image;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
        }

        // 商品に紐付いている季節データをすべて解除
        $product->seasons()->detach();

        // 商品を削除
        $product->delete();

        // 削除完了後、商品一覧ページへリダイレクト
        return redirect()->route('products.index')->with('success', '商品を削除しました。');
    }
}
