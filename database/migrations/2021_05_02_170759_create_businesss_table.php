<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinesssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesss', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->longText('description');
            $table->integer('since');
            $table->string('owner_name', 255);
            $table->unsignedBigInteger('owner_id')->unsigned();
            $table->foreign('owner_id')->references('owner_id')->on('owners')->onDelete('cascade');
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
        Schema::dropIfExists('businesss');
    }
}
