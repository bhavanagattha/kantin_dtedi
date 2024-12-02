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
        Schema::create('cashier', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->integer('no_telp');
            $table->integer('salary');
            $table->enum('status', ['active', 'inactive']);
            $table->string('profile_picture');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashier');
    }
};
