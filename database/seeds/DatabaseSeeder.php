<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create();

        $user1 = User::create([
            'name' => 'Orest 25',
            'email' => 'orest@gmail.com',
            'nickname' => 'orest12',
            'password' => Hash::make('aaaaaa')
        ]);
        $user2 = User::create([
            'name' => 'Andrew Martin',
            'email' => 'andrew@gmail.com',
            'nickname' => 'andrew256',
            'password' => Hash::make('aaaaaa')
        ]);
        $user3 = User::create([
            'name' => 'Bogdan Bogdan',
            'email' => 'bodya@gmail.com',
            'nickname' => 'bodya252',
            'password' => Hash::make('aaaaaa')
        ]);
        $user1->posts()->create([
            'content' => '{"ops":[{"attributes":{"size":"large"},"insert":"' . $faker->sentence() . '"},{"insert":"\n"}]}',
            // 'replies' => 100
        ]);
        $user3->posts()->create([
            'content' => '{"ops":[{"attributes":{"size":"large"},"insert":"' . $faker->sentence() . '"},{"insert":"\n"}]}'
        ]);
        $user2->posts()->create([
            'content' => '{"ops":[{"attributes":{"size":"large"},"insert":"' . $faker->sentence() . '"},{"insert":"\n"}]}'
        ]);
        $user1->posts()->create([
            'content' => '{"ops":[{"attributes":{"size":"large"},"insert":"' . $faker->sentence() . '"},{"insert":"\n"}]}'
        ]);
        $user3->posts()->create([
            'content' => '{"ops":[{"attributes":{"size":"large"},"insert":"' . $faker->sentence() . '"},{"insert":"\n"}]}'
        ]);
    }
}
