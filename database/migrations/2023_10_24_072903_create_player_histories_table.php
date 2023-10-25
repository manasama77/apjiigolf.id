<?php

use App\Models\EventLocation;
use App\Models\Player;
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
        Schema::create('player_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Player::class);
            $table->foreignIdFor(EventLocation::class);
            $table->integer('out')->default(0)->unsigned()->comment('par 1 ~ 9 max 36');
            $table->integer('in')->default(0)->unsigned()->comment('par 10 ~ 18 max 36');
            $table->integer('gross')->default(0)->unsigned()->comment('score par 1 ~ 18');
            $table->integer('handicap')->default(0)->unsigned()->comment('AVG score par 1 ~ 18');
            $table->integer('net')->default(0)->unsigned()->comment('gross - handicap');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_histories');
    }
};
