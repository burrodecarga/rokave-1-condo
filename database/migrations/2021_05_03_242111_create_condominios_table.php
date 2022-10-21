<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondominiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('administrador_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('rut')->nullable();
            $table->string('address')->nullable();
            $table->string('phones')->nullable();
            $table->string('mobil')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->integer('apartments')->default(0);
            $table->integer('level')->default(1);
            $table->foreign('administrador_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('condominios');
    }
}
