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
            $table->string('title');
            $table->string('slug');
            $table->string('price')->nullable();
            $table->string('size')->nullable();
            $table->longtext('description')->nullable();
            $table->longtext('gem_info')->nullable();
            $table->string('category_id')->nullable();
            $table->string('material_id')->nullable();
            $table->string('gemstone_id')->nullable();
            $table->string('birthstone')->nullable();
            $table->string('shape_id')->nullable();
            $table->string('meaning_id')->nullable();
            $table->string('ring_size')->nullable();
            $table->string('meta_name')->nullable();
            $table->longtext('meta_keyword')->nullable();
            $table->longtext('meta_description')->nullable();
            $table->boolean('shipping')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
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
