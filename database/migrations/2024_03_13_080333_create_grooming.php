<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groomings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained('users')->cascadeOnDelete();
            $table->foreignIdFor(Product::class)->constrained('products')->cascadeOnDelete();
            $table->string('owner');
            $table->string('address');
            $table->string('phone_number');
            $table->string('pet_name');
            $table->string('pet_gender');
            $table->integer('pet_age');
            $table->string('sinyalement');
            $table->string('equipment');
            $table->date('date');
            $table->time('session');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groomings');
    }
};
