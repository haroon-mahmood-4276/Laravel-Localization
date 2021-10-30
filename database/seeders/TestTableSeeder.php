<?php

namespace Database\Seeders;

use App\Models\Test;
use App\Models\TestTranslation;
use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Test::insert([
            [
                'id' => '1',
                'image' => '4VwFdceOR8V91t2gENPSAs5tXW5VvdYzuL8tFka3.jpg',
            ],
            [
                'id' => '2',
                'image' => 'HfEdeEh7d4rrVyBeSP9veXCDxu7xKStDz3rUYHue.png',
            ],
        ]);

        TestTranslation::insert([
            [
                'id' => '1',
                'test_id' => '1',
                'name' => 'Test Data',
                'description' => 'this is test data description',
                'locale' => 'en',
            ],
            [
                'id' => '2',
                'test_id' => '1',
                'name' => 'بيانات الاختبار',
                'description' => 'هذا هو وصف بيانات الاختبار',
                'locale' => 'ar',
            ],
            [
                'id' => '3',
                'test_id' => '2',
                'name' => 'Test Data',
                'description' => 'this is test data description',
                'locale' => 'en',
            ],
            [
                'id' => '4',
                'test_id' => '2',
                'name' => 'بيانات الاختبار',
                'description' => 'هذا هو وصف بيانات الاختبار',
                'locale' => 'ar',
            ],
        ]);
    }
}
