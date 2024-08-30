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
            $table->string("name");
            $table->string("slug");
            $table->float("price");
            $table->float("discount_price")->nullable();
            $table->string("short_desc", 500);
            $table->text("long_desc");
            $table->string("image");
            $table->string("keyword")->nullable();
            $table->string("status");
            $table->integer("qty")->nullable();
            $table->tinyInteger("cat_id");
            $table->tinyInteger("manufac_id");
            $table->tinyInteger("vendor_id");
            $table->string("featured")->nullable();
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
