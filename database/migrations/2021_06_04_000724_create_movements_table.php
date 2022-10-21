<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->enum('tipo', ['ingreso', 'egreso']);
            $table->enum('condicion', ['por confirmar', 'confirmado','anulado']);
            $table->string('origen')->nullable();
            $table->double('monto', 12, 2);
            $table->string('referencia', 100);
            $table->longText('descripcion');
            $table->integer('condominio_id')->unsigned();
            $table->string('condominio')->nullable();
            $table->string('apartamento')->nullable();
            $table->string('bank')->nullable();
            $table->string('cuenta')->nullable();
            $table->integer('apartamento_id')->unsigned();
            $table->bigInteger('bank_id')->unsigned();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');

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
        Schema::dropIfExists('movements');
    }
}
