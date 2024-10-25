<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('text');
            $table->foreignId('user_id')->nullable()->index();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
