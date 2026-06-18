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
        Schema::create('link_management_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('destination_url', 2048);
            $table->string('slug')->unique();
            $table->string('domain')->default('l.sp');
            $table->string('password')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_secure_gateway')->default(true); // Enforce JS Bot Shield
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_management_links');
    }
};
