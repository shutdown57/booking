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
        Schema::create('bookable_user', function (Blueprint $table) {
            $table->id();
            $table->timestamp('book_in')->nullable();
            $table->timestamp('book_out')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->cascadeOnUpdate();

            $table->unsignedBigInteger('bookable_id')->nullable();
            $table->foreign('bookable_id')
                ->references('id')
                ->on('bookables')
                ->onDelete('set null')
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookable_user');
    }
};
