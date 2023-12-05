<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                ['code' =>'case',
                'name_ua'=> "Комп'ютерні корпуси",
                'name_ru'=> "Компьютерные корпуса",
            ],
                ['code' =>'power',
                'name_ua'=> "Блоки живлення",
                'name_ru'=> "Блоки питания",
            ],
            ['code' =>'sound',
                'name_ua'=> "Акустика",
                'name_ru'=> "Акустика",
            ],
            ['code' =>'input',
                'name_ua'=> "Пристрої введення 	",
                'name_ru'=> "Устройства ввода",
            ],
            ['code' =>'appliances',
                'name_ua'=> "Побутова техніка",
                'name_ru'=> "Бытовая техника",
            ],
            ['code' =>'cooler',
                'name_ua'=> "Пристрої охолодження",
                'name_ru'=> "Устройства охлаждения",
            ],

        ]);
    }
}
