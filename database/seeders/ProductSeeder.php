<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::get();

        foreach ($categories as $category) {
           // dd($category->code);
            switch ($category->code) {

                case 'case':
                    DB::table('products')->insert([
                        [
                            'category_id' => $category->id,
                            'name_ua' => 'Phantom 1',
                            'name_ru' => 'Phantom 1',
                        ],
                        [
                            'category_id' => $category->id,
                            'name_ua' => 'N13',
                            'name_ru' => 'N13',
                        ]
                    ]);
                    break;
                case 'power':
                    DB::table('products')->insert([
                        [
                            'category_id' => $category->id,
                            'name_ua' => 'ATX-SH110E',
                            'name_ru' => ' ATX-SH110E ',
                        ],
                        [
                            'category_id' => $category->id,
                            'name_ua' => '1300GBC',
                            'name_ru' => '1300GBC',
                        ]
                    ]);
                    break;

                case 'sound':
                    DB::table('products')->insert([
                        [
                            'category_id' => $category->id,
                            'name_ua' => 'S3300',
                            'name_ru' => 'S3300',
                        ],
                        [
                            'category_id' => $category->id,
                            'name_ua' => 'M2215',
                            'name_ru' => 'M2215',
                        ]
                    ]);
                    break;


                case 'input':
                    DB::table('products')->insert([
                        [
                            'category_id' => $category->id,
                            'name_ua' => 'Мишка M02',
                            'name_ru' => 'Мышь M02',
                        ],
                        [
                            'category_id' => $category->id,
                            'name_ua' => 'Клавіатура K1400I',
                            'name_ru' => 'Клавиатура K1400I',
                        ]
                    ]);
                    break;
                case 'cooler':
                    DB::table('products')->insert([
                        [
                            'category_id' => $category->id,
                            'name_ua' => 'Вентилятор 140 мм',
                            'name_ru' => 'Вентилятор 140 мм',
                        ],
                        [
                            'category_id' => $category->id,
                            'name_ua' => 'Світлодіодна підсвітка',
                            'name_ru' => 'Светлодиодная подсветка',
                        ]
                    ]);
                    break;
                case 'appliances':
                    DB::table('products')->insert([
                        [
                            'category_id' => $category->id,
                            'name_ua' => 'Golden Field 1301/1302',
                            'name_ru' => 'Golden Field 1301/1302',
                        ],
                        [
                            'category_id' => $category->id,
                            'name_ua' => 'VonShef 35L',
                            'name_ru' => 'VonShef 35L',
                        ]
                    ]);
                    break;
            }
        };
    }
}
