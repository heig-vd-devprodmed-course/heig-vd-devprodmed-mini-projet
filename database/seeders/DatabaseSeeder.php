<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert John Doe into the users table
        DB::table('users')->insert([
            'id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'johndoe',
            'email' => 'john.doe@example.com',
        ]);

        // Insert Jane Doe into the users table
        DB::table('users')->insert([
            'id' => 2,
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'username' => 'janedoe',
            'email' => 'jane.doe@example.com',
        ]);

        // Insert some posts for John Doe
        DB::table('posts')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'title' => "John's First Post",
                'content' => "This is the content of John's first post.",
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'content' => "This is the content of John's second post.",
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'content' => "This is the content of John's third post.",
            ]
        ]);

        // Insert some posts for Jane Doe
        DB::table('posts')->insert([
            [
                'id' => 4,
                'user_id' => 2,
                'content' => "This is the content of Jane's first post.",
            ],
            [
                'id' => 5,
                'user_id' => 2,
                'title' => "Jane's Second Post",
                'content' => "This is the content of Jane's second post.",
            ],
            [
                'id' => 6,
                'user_id' => 2,
                'title' => "Jane's Third Post",
                'content' => "This is the content of Jane's third post.",
            ]
        ]);

        // Insert some likes for John's posts
        DB::table('likes')->insert([
            [
                'user_id' => 2,
                'post_id' => 1,
                'reaction' => 'like',
            ],
            [
                'user_id' => 1, // John likes his own post
                'post_id' => 2,
                'reaction' => 'love',
            ],
        ]);

        // Insert some likes for Jane's posts
        DB::table('likes')->insert([
            [
                'user_id' => 1,
                'post_id' => 4,
                'reaction' => 'like',
            ],
            [
                'user_id' => 1,
                'post_id' => 5,
                'reaction' => 'love',
            ],
            [
                'user_id' => 2, // Jane likes her own post
                'post_id' => 5,
                'reaction' => 'wow',
            ]
        ]);
    }
}
