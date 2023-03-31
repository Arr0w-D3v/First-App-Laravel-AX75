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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 10)->nullable(false)->unique();
            $table->string('name', 50)->nullable(false);
            $table->string('description', 50)->nullable(false);
            $table->integer('price')->default(0);
            $table->integer('stock')->default(0);
            $table->boolean('is_active')->default(true);
            $table->integer('created_by')->nullable(false);
            $table->integer('updated_by')->nullable(true);
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
        Schema::dropIfExists('products');
    }
};
