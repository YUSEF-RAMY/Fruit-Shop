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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->decimal('price', 8 , 2);
            $table->integer('quantity')->default(0);
            $table->text('imagepath')->nullable();
            $table->text('description')->nullable();


            $table->foreignId('category_id')->constrained('categories')->distinct()->onDelete('cascade');
            // $table->unsignedBigInteger('category_id'); // this's a foreign key
            // $table->foreign('category_id')->distinct()->references('id')->on('categories')->onDelete('cascade'); // this is a foreign key

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};





