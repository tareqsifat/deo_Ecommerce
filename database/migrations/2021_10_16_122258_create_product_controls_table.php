<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('product_controls', function (Blueprint $table) {
            $table->id();
            $table->string('amount_of_cod',100);
            $table->string('category_id',100);
            $table->string('category_cod',100);
            $table->string('category_cod_amount',100);
            $table->string('category_partial',100);
            $table->string('category_discount',100);
            $table->string('digital_cod',100);
            $table->string('digital_partial',100);
            $table->string('digital_discount',100);
            $table->string('brand_id',100);
            $table->string('brand_cod',100);
            $table->string('brand_cod_amount',100);
            $table->string('brand_partial',100);
            $table->string('brand_discount',100);
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
        Schema::dropIfExists('product_controls');
    }
}
