<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_visits', function (Blueprint $table) {
            $table->id();
            $table->string('path')->default('/');
            $table->string('session_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->date('visited_on')->index();
            $table->timestamps();

            $table->unique(['session_id', 'path', 'visited_on']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_visits');
    }
};
