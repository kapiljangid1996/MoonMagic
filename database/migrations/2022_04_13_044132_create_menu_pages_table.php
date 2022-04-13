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
        Schema::create('menu_pages', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id')->default(0);
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('parent_id')->default(0);
            $table->integer('sort_number')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('new_tab')->default(0);
            $table->string('page_type')->nullable();
            $table->integer('page_id')->default(0);
            $table->boolean('mega_menu')->default(0);
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
        Schema::dropIfExists('menu_pages');
    }
};
