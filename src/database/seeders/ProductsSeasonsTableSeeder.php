<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 既存のデータをすべて削除（シーダーを複数回実行する場合に便利）
        DB::table('products_seasons')->truncate();

        // 季節のIDを取得
        $seasons = DB::table('seasons')->pluck('id', 'name');

        // 商品のIDを取得
        $products = DB::table('products')->pluck('id', 'name');

        // 中間テーブルにデータを挿入
        DB::table('products_seasons')->insert([
            [
                'product_id' => $products['キウイ'],
                'season_id' => $seasons['秋'],
            ],
            [
                'product_id' => $products['キウイ'],
                'season_id' => $seasons['冬'],
            ],
            [
                'product_id' => $products['ストロベリー'],
                'season_id' => $seasons['春'],
            ],
            [
                'product_id' => $products['オレンジ'],
                'season_id' => $seasons['冬'],
            ],
            [
                'product_id' => $products['スイカ'],
                'season_id' => $seasons['夏'],
            ],
            [
                'product_id' => $products['ピーチ'],
                'season_id' => $seasons['夏'],
            ],
            [
                'product_id' => $products['シャインマスカット'],
                'season_id' => $seasons['夏'],
            ],
            [
                'product_id' => $products['シャインマスカット'],
                'season_id' => $seasons['秋'],
            ],
            [
                'product_id' => $products['パイナップル'],
                'season_id' => $seasons['春'],
            ],
            [
                'product_id' => $products['パイナップル'],
                'season_id' => $seasons['夏'],
            ],
            [
                'product_id' => $products['ブドウ'],
                'season_id' => $seasons['夏'],
            ],
            [
                'product_id' => $products['ブドウ'],
                'season_id' => $seasons['秋'],
            ],
            [
                'product_id' => $products['バナナ'],
                'season_id' => $seasons['夏'],
            ],
            [
                'product_id' => $products['メロン'],
                'season_id' => $seasons['春'],
            ],
            [
                'product_id' => $products['メロン'],
                'season_id' => $seasons['夏'],
            ],
        ]);
    }
}
