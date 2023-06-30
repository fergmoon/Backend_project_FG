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
        Schema::create('services', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedBigInteger('quantity');  //  El método unsignedBigInteger() especifica que la columna almacenará valores enteros sin signo, lo que significa que solo se permitirán valores positivos o cero.
            $table->enum('type', ['design', 'production']);
            $table->integer("unit_value");
            $table->integer("total_value");
            $table->string("customer");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
