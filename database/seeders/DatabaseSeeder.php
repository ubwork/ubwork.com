<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $fake = Faker::create();
        foreach (range(1, 10) as $index){
            DB::table('customers')->insert([
                'name'=>$fake->name,
                "avatar" => $fake->imageUrl($width = 200, $height = 200),
                "email" => $fake->unique()->email,
                "password" => $fake->password,
                "phone" => $fake->unique()->numberBetween($min = 10, $max = 1000),
                "address" => $fake->address,
                "position" => $fake->name,
                "gender" => $fake->numberBetween($min = 1, $max = 3),
                "city" => $fake->city,
                "coin" => $fake->numberBetween($min = 10, $max = 200),
                "is_active" => $fake->numberBetween($min = 1, $max = 1),
                "deleted_at" => $fake->numberBetween($min = 0, $max = 0),
                "status" => $fake->numberBetween($min = 1, $max = 1),
                "created_at" => $fake->date("Y-m-d H:i:s"),
                "updated_at" => $fake->date("Y-m-d H:i:s"),
            ]);
        }
    }
}
