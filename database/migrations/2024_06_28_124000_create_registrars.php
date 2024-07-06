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
        Schema::create('registras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('logo')->nullable();
            $table->string('email')->nullable();
            $table->text('previous_names');
            $table->string('company_name');
            $table->string('phone_no')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('address');
            $table->boolean('accredited')->default(false)->nullable();
            $table->boolean('debt')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registras');
    }
};
