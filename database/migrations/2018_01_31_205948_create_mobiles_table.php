<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('name');
            $table->text('description');
            $table->double('price',6,2);
            $table->string('image')->nullable();
            $table->string('cpu')->nullable();
            $table->string('camera')->nullable();
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->string('display')->nullable();
            $table->string('battery')->nullable();
            $table->string('memory')->nullable();
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
        Schema::dropIfExists('mobiles');
    }
}