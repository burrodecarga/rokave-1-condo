<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_expenditures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ano')->unsigned();
            $table->bigInteger('mes')->unsigned();
            $table->text('nmes')->nullable();
            $table->bigInteger('condominio_id')->unsigned();
            $table->string('condominio')->nullable();
            $table->double('gastoOrdinario',10,2);
            $table->double('gastoExtraOrdinario',10,2);
            $table->double('reserva',10,2);
            $table->double('gastoTotal',10,2);
            $table->text('descripcion');
            $table->bigInteger('publicado')->unsigned();
            $table->bigInteger('facturado')->unsigned();
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
        Schema::dropIfExists('monthly_expenditures');
    }
}
