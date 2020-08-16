<?php

use Illuminate\Database\Seeder;
use App\Models\ItemCondition;

class ItemConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'id'      => 1,
                'name'    => '新品、未使用',
                'sort_no' => 1,
            ],
            [
                'id'      => 2,
                'name'    => '未使用に近い',
                'sort_no' => 2,
            ],
            [
                'id'      => 3,
                'name'    => '目立った傷や汚れなし',
                'sort_no' => 3,
            ],
            [
                'id'      => 4,
                'name'    => 'やや傷や汚れあり',
                'sort_no' => 4,
            ],
            [
                'id'      => 5,
                'name'    => '傷や汚れあり',
                'sort_no' => 5,
            ],
            [
                'id'      => 6,
                'name'    => '全体的に状態が悪い',
                'sort_no' => 6,
            ],
        ];

        foreach ($records as $record) {
            factory(ItemCondition::class)->create($record);
        }
    }
}
