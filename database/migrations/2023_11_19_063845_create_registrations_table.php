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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('gender');
            $table->string('email');
            $table->string('whatsapp_number');
            $table->string('company_name');
            $table->string('position');
            $table->string('institution');
            $table->string('institution_etc')->nullable();
            $table->string('order_id');
            $table->integer('payment_status');
            $table->string('snap_token', 36);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
