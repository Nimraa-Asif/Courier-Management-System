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
        Schema::create('agent_infos', function (Blueprint $table) {
            $table->id();
            $table->string('Agent_Name');
            $table->string('Email')->unique();
            $table->bigInteger('Contact');
            $table->string('Location');
            $table->string('Salary');
            $table->string('Password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_infos');
    }
};
