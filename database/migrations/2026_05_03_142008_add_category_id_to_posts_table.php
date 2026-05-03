<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // On ajoute une colonne category_id dans la table posts
            // nullable() = un post peut exister sans catégorie
            // (important pour les posts déjà existants en base !)
            // after('content') = la colonne s'insère après la colonne content
            $table->foreignId('category_id')
                  ->nullable()
                  ->after('content')
                  ->constrained('categories') // category_id doit exister dans la table categories
                  ->nullOnDelete();           // si on supprime une catégorie, les posts passent à null
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Si on annule cette migration, on retire la colonne proprement
            $table->dropForeignId('category_id');
            $table->dropColumn('category_id');
        });
    }
};
