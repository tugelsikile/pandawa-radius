<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->string('id',100)->primary()->unique();
            $table->string('level_id',100);
            $table->string('menu_id',100);
            $table->boolean('R_opt')->default(1);
            $table->boolean('C_opt')->default(1);
            $table->boolean('U_opt')->default(1);
            $table->boolean('D_opt')->default(1);
            $table->integer('orders');
            $table->timestamps();
            $table->foreign('level_id')->on('user_levels')->references('id')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('menu_id')->on('menus')->references('id')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privileges');
    }
}
