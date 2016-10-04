<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    private $userRepository;

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            User::create([
                'email' => $faker->email,
                'name' => $faker->name,
                'address' => $faker->address,
                'phone' => $faker->e164PhoneNumber,
                'password' => Hash::make('123456'),
                'role' => config('user.role.user'),
            ]);
        }

        User::create([
            'email' => 'admin@framgia.com',
            'name' => 'Admin',
            'address' => $faker->address,
            'phone' => $faker->e164PhoneNumber,
            'password' => Hash::make('123456'),
            'role' => config('user.role.admin'),
        ]);
    }
}
