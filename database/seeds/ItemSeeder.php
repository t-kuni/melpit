<?php

use Illuminate\Database\Seeder;
use App\Models\ItemCondition;
use App\Models\SecondaryCategory;
use App\Models\Item;
use Faker\Factory as Faker;

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

        for ($i = 0; $i < 200; $i++) {
            $item = [
                'seller_id'             => 1,
                'buyer_id'              => 1,
                'secondary_category_id' => $faker->randomElement($categories)->id,
                'item_condition_id'     => $faker->randomElement($conditions)->id,
                'name'                  => $faker->city,
                'image_file_name'       => '',
                'description'           => $faker->realText,
                'price'                 => $faker->numberBetween(100, 9999999),
                'state'                 => $faker->randomElement([Item::STATE_BOUGHT, Item::STATE_SELLING]),
                'bought_at'             => $faker->dateTime,
            ];
            $buffer[] = $item;

            if (count($buffer) == 200) {
                \Illuminate\Support\Facades\DB::table('items')->insert($buffer);
                $buffer = [];
            }
        }
    }
}
