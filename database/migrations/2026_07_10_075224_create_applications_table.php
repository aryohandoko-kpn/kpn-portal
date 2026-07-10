<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_applications_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('department')->nullable();
            $table->string('owner')->nullable();
            $table->string('url');
            $table->enum('environment', ['Production', 'Staging', 'Development'])->default('Production');
            $table->enum('status', ['active', 'inactive', 'maintenance'])->default('active');
            $table->integer('display_order')->default(0);
            $table->string('icon')->nullable(); // path ke file icon di storage
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};