<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hobby_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->foreignId('hobby_id')->constrained()->onDelete('cascade');

            $table->primary(['user_id', 'hobby_id']);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('hobby_user');
    }
};
