<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Users
        DB::table('users')->insert([
            [
                'id' => 1,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'username' => 'johndoe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password'),
                'created_at' => new \DateTime('2026-02-09 10:00:00'),
                'updated_at' => new \DateTime('2026-02-09 10:00:00'),
                'is_admin' => true,
            ],
            [
                'id' => 2,
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'username' => 'janedoe',
                'email' => 'jane.doe@example.com',
                'password' => Hash::make('password'),
                'created_at' => new \DateTime('2026-02-09 11:00:00'),
                'updated_at' => new \DateTime('2026-02-09 11:00:00'),
                'is_admin' => false,
            ],
        ]);

        // 2. Paintings via PaintingSeeder
        $this->call(PaintingSeeder::class);

        // 3. Likes (après que les paintings existent)
        DB::table('likes')->insert([
            [
                'user_id' => 2,
                'painting_id' => 1,
                'reaction' => 'like',
                'created_at' => new \DateTime('2026-02-09 12:20:00'),
                'updated_at' => new \DateTime('2026-02-09 12:20:00'),
            ],
            [
                'user_id' => 1,
                'painting_id' => 2,
                'reaction' => 'love',
                'created_at' => new \DateTime('2026-02-09 12:25:00'),
                'updated_at' => new \DateTime('2026-02-09 12:25:00'),
            ],
            [
                'user_id' => 1,
                'painting_id' => 4,
                'reaction' => 'like',
                'created_at' => new \DateTime('2026-02-09 12:30:00'),
                'updated_at' => new \DateTime('2026-02-09 12:30:00'),
            ],
            [
                'user_id' => 2,
                'painting_id' => 5,
                'reaction' => 'wow',
                'created_at' => new \DateTime('2026-02-09 12:40:00'),
                'updated_at' => new \DateTime('2026-02-09 12:40:00'),
            ],
        ]);
    }
}
