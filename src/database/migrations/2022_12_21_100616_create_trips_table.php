<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('from');
            $table->string('to');
            $table->string('status')->default('Active');
            $table->foreignUuid('user_id')->constrained('users')->index();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('trips');
    }
};
