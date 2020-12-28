<?php

use Illuminate\Database\Seeder;
use App\Models\ItemCondition;
use App\Models\SecondaryCategory;
use App\Models\Item;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::truncate();

        $faker = Faker::create('ja_JP');

        $categories = SecondaryCategory::all();
        $conditions = ItemCondition::all();

        $buffer = [];

        $names = [
            "寿司",
            "天ぷら",
            "鶏の唐揚げ",
            "とんかつ",
            "肉じゃが",
            "そば",
            "刺身",
            "うどん",
            "うな重",
            "すき焼き",
            "豚汁",
            "おでん",
            "しゃぶしゃぶ",
            "茶碗蒸し",
            "親子丼",
            "お好み焼き",
            "しょうが焼き",
            "だし巻き",
            "水炊き",
            "お茶漬け",
            "味噌汁",
            "たこ焼き",
            "さばのみそ煮",
            "ステーキ",
            "炊き込みご飯",
            "醤油ラーメン",
            "そうめん",
            "納豆",
            "カツ丼",
            "牛タン",
            "ちらし寿司",
            "焼きそば",
            "エビフライ",
            "辛子明太子",
            "天丼",
            "さんまの塩焼き",
            "きんぴらごぼう",
            "卵かけご飯",
            "筑前煮",
            "鰹のたたき",
            "いかの塩辛",
            "冷奴",
            "角煮",
            "カレーライス",
            "焼き鳥",
            "雑煮",
            "高野豆腐",
            "オムライス",
            "枝豆",
            "ぶりと大根の煮物（ブリ大根）",
            "ひじき",
            "切り干し大根",
            "イカそうめん",
            "たくあん",
            "白和え",
            "湯豆腐",
            "焼肉",
            "豚骨ラーメン",
            "穴子",
            "キムチ鍋",
            "もずく",
            "豚骨醤油ラーメン",
            "卯の花",
            "いくら丼",
            "ちゃんぽん",
            "ねぎとろ",
            "おから",
            "明太子スパゲティ",
            "海老マヨ",
            "牛すじ",
            "揚げ出し豆腐",
            "イカと大根の煮物",
            "ぬか漬け",
            "辛子れんこん",
            "肉吸い",
            "西京漬",
        ];

        $status = [
            Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_SELLING,
            Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_SELLING,
            Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_SELLING,
            Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_SELLING, Item::STATE_BOUGHT,
        ];

        for ($i = 0; $i < 100; $i++) {
            $item     = [
                'seller_id'             => 1,
                'buyer_id'              => 1,
                'secondary_category_id' => $faker->randomElement($categories)->id,
                'item_condition_id'     => $faker->randomElement($conditions)->id,
                'name'                  => $faker->randomElement($names),
                'image_file_name'       => '',
                'description'           => $faker->realText,
                'price'                 => $faker->numberBetween(100, 9999999),
                'state'                 => $faker->randomElement($status),
                'bought_at'             => $faker->dateTime,
                'updated_at'            => Carbon::now(),
                'created_at'            => Carbon::now(),
            ];
            $buffer[] = $item;

            if (count($buffer) == 100) {
                \Illuminate\Support\Facades\DB::table('items')->insert($buffer);
                $buffer = [];
            }
        }
    }
}
