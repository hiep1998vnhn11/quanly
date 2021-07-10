<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('alias', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('category', 255)->nullable();
            $table->string('unit', 55)->default('Cái')->nullable();
            $table->string('import_price', 255)->default(0)->nullable();
            $table->string('retail_price', 255)->default(0)->nullable();
            $table->string('sale_price', 255)->default(0)->nullable();
            $table->string('DVT', 255)->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
}
