<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'staff',
            function (Blueprint $table) {
                $table->id('staff_id');
                $table->string('username')->unique();
                $table->string('name');
                $table->string('staff_role');
                $table->unsignedBigInteger('outlet_id');
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();

                $table->index('username');
                $table->index('outlet_id');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
