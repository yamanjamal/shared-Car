<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tripuser', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignUuid('trip_id')->constrained('trips');
            $table->double('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tripuser');
    }
};
