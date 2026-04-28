<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            // Supprimer la clé étrangère post_id
            $table->dropForeign(['post_id']);
            // Renommer la colonne post_id en painting_id
            $table->renameColumn('post_id', 'painting_id');
        });

        Schema::table('likes', function (Blueprint $table) {
            // Ajouter la nouvelle clé étrangère
            $table->foreign('painting_id')->references('id')->on('paintings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->dropForeign(['painting_id']);
            $table->renameColumn('painting_id', 'post_id');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }
};
