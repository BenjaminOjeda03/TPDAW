<?php

// database/migrations/2025_11_20_000000_create_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('username', 50)->unique();
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->enum('perfil', ['Administrador','Gestion','Consultas'])->default('Consultas');
            $table->string('password');
            $table->softDeletes(); // deleted_at
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

 //Schema::dropIfExists('password_reset_tokens');
   //     Schema::dropIfExists('sessions');