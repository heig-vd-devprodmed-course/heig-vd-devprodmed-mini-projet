<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();                          // Colonne id auto-incrémentée (1, 2, 3...)
            $table->string('name');                // Le nom affiché : "RPG", "FPS", "Indie"...
            $table->string('slug')->unique();      // L'identifiant dans l'URL : "rpg", "fps", "indie"
                                                   // unique() = deux catégories ne peuvent pas avoir le même slug
            $table->timestamps();                  // created_at et updated_at, gérés automatiquement par Laravel
        });
    }

    public function down(): void
    {
        // Si on annule la migration, on supprime la table
        Schema::dropIfExists('categories');
    }
};
