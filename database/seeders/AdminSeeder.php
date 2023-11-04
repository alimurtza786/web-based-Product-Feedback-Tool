<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            Admin::create([
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('Alimurtaza786.'),
                'is_admin' => 1,
            ]);
        }
    }
}
