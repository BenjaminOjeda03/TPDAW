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
    $table->string('nombre');
    $table->string('apellido');
    $table->string('nombre_usuario')->unique();
    $table->string('email')->unique();
    $table->string('telefono')->nullable();
    $table->enum('perfil', ['Administrador', 'Gestion', 'Consultas'])->default('Consultas');
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->softDeletes();
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