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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->integer('total_play')->default(0)->unsigned();
            $table->decimal('gross', 8, 2)->default(0)->unsigned()->comment('AVG PLAYER GROSS ALL LOCATION');
            $table->decimal('handicap', 8, 2)->default(0)->unsigned()->comment('AVG PLAYER HANDICAP ALL LOCATION');
            $table->decimal('net', 8, 2)->default(0)->unsigned()->comment('GROSS - HANDICAP');
            $table->integer('seq')->default(0)->unsigned()->comment('increment');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
