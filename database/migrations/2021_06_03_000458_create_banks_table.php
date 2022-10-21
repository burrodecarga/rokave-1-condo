<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
        $table->string('cuenta');
        $table->decimal('debe', 10, 2)->default(0);
        $table->decimal('haber', 10, 2)->default(0);
        $table->decimal('saldo', 10, 2)->default(0);
        $table->bigInteger('condominio_id')->unsigned();
        $table->foreign('condominio_id')->references('id')->on('condominios')->onDelete('cascade');
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
        Schema::dropIfExists('banks');
    }
}
