<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('metaTitle')->nullable();
            $table->longText('metaDescription')->nullable();
            $table->string('metaKeyword')->nullable();
            $table->string('title')->nullable();
            $table->string('shortTitle')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->date('date')->nullable();
            $table->enum('status',['0','1'])->default('0');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
