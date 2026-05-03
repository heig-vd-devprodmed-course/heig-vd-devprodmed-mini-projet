<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(
            function () {
                // ===== USERS =====
                DB::table('users')->insert([
                    'id' => 1,
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'username' => 'johndoe',
                    'email' => 'john.doe@example.com',
                    'password' => Hash::make('password'),
                    'created_at' => new \DateTime('2026-02-09 10:00:00'),
                    'updated_at' => new \DateTime('2026-02-09 10:00:00'),
                ]);

                DB::table('users')->insert([
                    'id' => 2,
                    'first_name' => 'Jane',
                    'last_name' => 'Doe',
                    'username' => 'janedoe',
                    'email' => 'jane.doe@example.com',
                    'password' => Hash::make('password'),
                    'created_at' => new \DateTime('2026-02-09 11:00:00'),
                    'updated_at' => new \DateTime('2026-02-09 11:00:00'),
                ]);

                // ===== CATEGORIES =====
                // Doit être AVANT les posts car les posts ont besoin des category_id
                DB::table('categories')->insert([
                    ['id' => 1, 'name' => 'RPG', 'slug' => 'rpg',
                     'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
                    ['id' => 2, 'name' => 'FPS', 'slug' => 'fps',
                     'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
                    ['id' => 3, 'name' => 'Indie', 'slug' => 'indie',
                     'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
                    ['id' => 4, 'name' => 'Aventure', 'slug' => 'aventure',
                     'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
                    ['id' => 5, 'name' => 'Sport', 'slug' => 'sport',
                     'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
                ]);

                // ===== POSTS =====
                // Les posts de John avec leurs catégories gaming
                DB::table('posts')->insert([
                    [
                        'id' => 1,
                        'user_id' => 1,
                        'category_id' => 1, // RPG
                        'title' => "Review : Elden Ring",
                        'content' => "Un chef d'œuvre du genre RPG. La liberté d'exploration est incroyable.",
                        'created_at' => new \DateTime('2026-02-09 12:00:00'),
                        'updated_at' => new \DateTime('2026-02-09 12:00:00'),
                    ],
                    [
                        'id' => 2,
                        'user_id' => 1,
                        'category_id' => 2, // FPS
                        'title' => null,
                        'content' => "Counter-Strike 2 est toujours aussi addictif après toutes ces années.",
                        'created_at' => new \DateTime('2026-02-09 12:05:00'),
                        'updated_at' => new \DateTime('2026-02-09 12:05:00'),
                    ],
                    [
                        'id' => 3,
                        'user_id' => 1,
                        'category_id' => 3, // Indie
                        'title' => null,
                        'content' => "Hades est le meilleur roguelike que j'ai jamais joué.",
                        'created_at' => new \DateTime('2026-02-09 12:10:00'),
                        'updated_at' => new \DateTime('2026-02-09 12:10:00'),
                    ]
                ]);

                // Les posts de Jane avec leurs catégories gaming
                DB::table('posts')->insert([
                    [
                        'id' => 4,
                        'user_id' => 2,
                        'category_id' => 1, // RPG
                        'title' => null,
                        'content' => "The Witcher 3 reste une référence absolue pour les RPG en monde ouvert.",
                        'created_at' => new \DateTime('2026-02-09 12:05:00'),
                        'updated_at' => new \DateTime('2026-02-09 12:05:00'),
                    ],
                    [
                        'id' => 5,
                        'user_id' => 2,
                        'category_id' => 4, // Aventure
                        'title' => "Review : Zelda Tears of the Kingdom",
                        'content' => "Nintendo a encore frappé fort. Les mécaniques de construction sont révolutionnaires.",
                        'created_at' => new \DateTime('2026-02-09 12:10:00'),
                        'updated_at' => new \DateTime('2026-02-09 12:10:00'),
                    ],
                    [
                        'id' => 6,
                        'user_id' => 2,
                        'category_id' => 2, // FPS
                        'title' => "Review : Valorant",
                        'content' => "Un FPS tactique très bien équilibré, même si la courbe d'apprentissage est rude.",
                        'created_at' => new \DateTime('2026-02-09 12:15:00'),
                        'updated_at' => new \DateTime('2026-02-09 12:15:00'),
                    ]
                ]);

                // ===== LIKES =====
                // Inchangés par rapport à l'original
                DB::table('likes')->insert([
                    [
                        'user_id' => 2,
                        'post_id' => 1,
                        'reaction' => 'like',
                        'created_at' => new \DateTime('2026-02-09 12:20:00'),
                        'updated_at' => new \DateTime('2026-02-09 12:20:00'),
                    ],
                    [
                        'user_id' => 1,
                        'post_id' => 2,
                        'reaction' => 'love',
                        'created_at' => new \DateTime('2026-02-09 12:25:00'),
                        'updated_at' => new \DateTime('2026-02-09 12:25:00'),
                    ],
                ]);

                DB::table('likes')->insert([
                    [
                        'user_id' => 1,
                        'post_id' => 4,
                        'reaction' => 'like',
                        'created_at' => new \DateTime('2026-02-09 12:30:00'),
                        'updated_at' => new \DateTime('2026-02-09 12:30:00'),
                    ],
                    [
                        'user_id' => 1,
                        'post_id' => 5,
                        'reaction' => 'love',
                        'created_at' => new \DateTime('2026-02-09 12:35:00'),
                        'updated_at' => new \DateTime('2026-02-09 12:35:00'),
                    ],
                    [
                        'user_id' => 2,
                        'post_id' => 5,
                        'reaction' => 'wow',
                        'created_at' => new \DateTime('2026-02-09 12:40:00'),
                        'updated_at' => new \DateTime('2026-02-09 12:40:00'),
                    ]
                ]);
            }
        );
    }
}
