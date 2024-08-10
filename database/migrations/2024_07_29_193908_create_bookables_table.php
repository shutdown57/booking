<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('per_hour_rate');
            $table->string('image')->nullable();
            $table->string('name');
            $table->unsignedTinyInteger('status')->default(0);
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->cascadeOnUpdate();

            $table->unsignedBigInteger('bookable_type_id')->nullable();
            $table->foreign('bookable_type_id')
                ->references('id')
                ->on('bookable_types')
                ->onDelete('set null')
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookables');
    }
};
