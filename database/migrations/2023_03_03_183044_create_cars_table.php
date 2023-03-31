<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand', 50)->nullable(false);
            $table->string('name', 50)->nullable(false);
            $table->string('color')->default('white');
            $table->integer('year')->default(2020); 
            $table->integer('price_hvat')->default(0);
            $table->integer('price_vat')->default(0);
            $table->longText('description')->nullable(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
