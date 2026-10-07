<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('phone');
            $table->string('package');
            $table->string('activity_type')->nullable();
            $table->unsignedInteger('monthly_amount');
            $table->string('status')->default('active');
            $table->timestamp('started_at')->nullable();
            $table->timestamps();

            $table->unique('lead_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
