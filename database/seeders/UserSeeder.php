<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(9)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345'),
            'phone' => '08123123123',
            'roles' => 'ADMIN',
        ]);

        $category = \App\Models\Category::factory()->create([
            'name' => 'category 1',
            'hashtag' => 'news,job',
            'icon' => '',
        ]);
    }
}
